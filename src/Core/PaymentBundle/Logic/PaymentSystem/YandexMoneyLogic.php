<?php
/**
 * Сервис для работы с платежной системой YandexMoney
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\PaymentBundle\Entity\Payment;
use Symfony\Component\DomCrawler\Crawler;

class YandexMoneyLogic extends PaymentSystemLogic
{
    const PAYMENT_SYSTEM    = 'YandexMoney';
    const FILE_IN           = '../../Certificate/in'; // файл доступный на чтение запись
    const FILE_OUT          = '../../Certificate/out'; // файл доступный на чтение запись
    const PUBLIC_ENCODE_KEY = '../../Certificate/rostpay.cer'; // публичнуй ключ для кодирования, присланный яндексом
    const PRIVATE_KEY       = '../../Certificate/private.key'; // приватный ключ сгенерированный вами
    const PASSWORD          = 'nYWKPFNs@YGB64&hA7FK'; // пароль к приватному ключу
    const PUBLIC_KEY        = '../../Certificate/rostpay.cer'; // публичный ключ для декодирования, присланный яндексом

    public function getRequestURL(Payment $payment, $options = array())
    {
        parent::checkPayment($payment);
        $paymentSystem = isset($options['PaymentSystem']) ? $options['PaymentSystem'] : self::PAYMENT_SYSTEM;
        $this->getSystem($paymentSystem);

        $amount = $this->getFullAmount($payment);

        $parameters = [
            'scid' => $this->system->getScid(),
            'ShopID' => $this->system->getShopID(),
            'paymentType' => $this->system->getSystem() === 'PlasticCard' ? 'AC' : 'PC',
            'customerNumber' => $options['userId'],
            'Sum' => $amount,
            'shporderid' => $options['orderId'],
            'shppaymentid' => $payment->getId(),
            'shopSuccessURL' => $this->system->getShopSuccessURL(),
            'shopFailURL' => $this->system->getShopFailURL(),
            'shpsystem' => $paymentSystem,
        ];

        $URL = $this->getCurrentRequestURL().'?'.http_build_query($parameters);

        $this->log($payment, $URL, self::LOG_REQUEST);

        return $URL;
    }

    /**
     * Обработка платежа от Яндекс.Деньги (в т.ч. и пластиковые карты)
     *
     * @return boolean
     * @throws Exception
     */
    public function doPassed($request)
    {

        $data          = $request->request->all();
        $paymentSystem = isset($data['shpsystem']) ? $data['shpsystem'] : self::PAYMENT_SYSTEM;
        $this->getSystem($paymentSystem);

        $orderId   = $data['shporderid'];
        $userId    = $data['customerNumber'];
        $paymentId = $data['shppaymentid'];

        $em      = $this->container->get('doctrine')->getManager();
        $mc      = $this->container->get('beryllium_cache');
        $payment = $em->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($paymentId, $paymentSystem, $userId);

        $this->log($payment, json_encode($data), self::LOG_RESPONSE);

        $this->checkPayment($payment);

        $error = false;

        // Проверяем хэш
        if (!$data['md5']) {
            $error = 'Хэш сумма не передана';
            $this->_responseYandex(1, $data, 'Произошла ошибка при проведении платежа', $error);
        }
        $hash = md5($data['action'].';'.$data['orderSumAmount'].';'.$data['orderSumCurrencyPaycash'].';'.$data['orderSumBankPaycash'].';'.$data['shopId'].';'.$data['invoiceId'].';'.$data['customerNumber'].';'.$this->system->getShopPassword());
        if (strtoupper($data['md5']) != strtoupper($hash)) {
            $error = 'Хэш суммы не совпадают';
            $this->_responseYandex(1, $data, 'Произошла ошибка при проведении платежа', $error);
        }
        // Статус
        if (!in_array($data['action'], array('checkOrder', 'paymentAviso'))) {
            $error = 'Статус не верен';
            $this->_responseYandex(100, $data, 'Произошла ошибка при проведении платежа', $error);
        }

        if ($error) {
            $this->log($payment, '#feedback - '.$error.'', self::LOG_ERROR);
            exit;
        } else {
            // Оплата
            if ($data['action'] == 'paymentAviso') {
                // Если все хорошо проставляем статус заказу - оплачен
                if ($mc->get($paymentId) || $orderId) {
                    $order = $em->getRepository('CoreOrderBundle:Order')->find($orderId ? $orderId : $mc->get($paymentId));
                    if (null !== $order) {
                        // Проставляем статус Оплачен
                        $status = $em->getRepository('CoreOrderBundle:ExtraStatus')->findOneByName('paid');
                        if (null !== $status) {
                            $order->setExtraStatus($status);
                        }
                        $order->setIsPaidStatus(true);
                        $em->flush($order);
                    } else {
                        $this->log($payment, '#feedback - Не найден заказ с id: '.($orderId ? $orderId : $mc->get($paymentId)), self::LOG_ERROR);
                    }
                }

                // проставляем статус платежу - выполнен
                $payment->setIsPassed(true);
                $em->flush($payment);
                $this->log($payment, '#feedback - Платеж выполнен успешно ', self::LOG_INFO);
            }
        }

        // Говорим Яндексу, что все ок
        $this->_responseYandex(0, $data);
        return true;
    }

    /**
     * Уведомление пользователя об успешном выполнении платежа
     *
     * @param type $request
     * @return array
     */
    public function getResultMessagesAndPayment($request)
    {
        $type          = $request->request->get('action') ? 'request' : 'query';
        $data          = $request->{$type}->all();
        $paymentSystem = isset($data['shpsystem']) ? $data['shpsystem'] : self::PAYMENT_SYSTEM;
        $this->getSystem($paymentSystem);
        $userId        = isset($data['customerNumber']) ? $data['customerNumber'] : 0;
        $paymentId     = isset($data['shppaymentid']) ? $data['shppaymentid'] : 0;
        $respose       = array();
        $em            = $this->container->get('doctrine')->getManager();
        $payment       = $em->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($paymentId, $paymentSystem, $userId);

        if (null === $payment) {
            $respose['error'][] = $this->trans('error.not_found_payment', array('%id%' => $paymentId));
        } else {
            if (false === $payment->getIsPassed()) {
                $msg                = $this->trans('error.payment_was_canceled');
                $respose['error'][] = $msg;
                $this->log($payment, '#result - '.$msg, self::LOG_ERROR);
            }
        }
        if (!isset($respose['error'])) {
            $respose['success'][] = $this->trans('success.payment_passed',
                ['%id%' => $paymentId, '%amount%' => number_format($payment->getAmount(), 2, ',', ' '), '%system%' => $payment->getSystem()->{'getCaption'.ucfirst($this->locale)}()]);
        }

        return [$respose, $payment];
    }

    /**
     * Ответ для Yandex
     *
     * @param type $Code
     * @param type $data
     * @param type $Message
     * @param type $TechMessage
     */
    private function _responseYandex($Code, $data = array(), $Message = '', $TechMessage = '')
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<'.$data['action'].'Response';
        $xml .= ' performedDatetime="'.date('Y-m-d\TH:i:s\Z').'"';
        $xml .= ' code="'.$Code.'"';
        $xml .= ' invoiceId="'.$data['invoiceId'].'"';
        $xml .= ' shopId="'.$data['shopId'].'"';
        if ($Message) {
            $xml .= ' message="'.$Message.'"';
        }
        if ($TechMessage) {
            $xml .= ' techMessage="'.$TechMessage.'"';
        }
        $xml .= '/>';
        echo $xml;
        exit;
    }

    /**
     * Отправка запроса в систему Яндекс
     *
     * @param type $url - тестоввый шлюз/webservice/deposition/api/запрос
     * @param type $data - закодированный в pkcs7 пакет, XML - структура  c необходимыми атрибутами запроса
     * @return type
     */
    private function _sendRefundRequest($data)
    {
        if ($this->system->getIsTest()) {
            $url = 'https://penelope-demo.yamoney.ru:8083/webservice/mws/api/returnPayment';
        } else {
            $url = 'https://penelope.yamoney.ru/webservice/mws/api/returnPayment';
        }
        $url     = 'https://penelope-demo.yamoney.ru:8083/webservice/mws/api/returnPayment';
        $headers = array(
            "Content-type: application/pkcs7-mime; charset=\"utf-8\"",
            "Content-length: ".strlen($data)
        );
        $ch      = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Ymoney CollectMoney');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLCERT, realpath(__DIR__.'/'.self::PUBLIC_ENCODE_KEY));
        curl_setopt($ch, CURLOPT_SSLKEY, realpath(__DIR__.'/'.self::PRIVATE_KEY));
        curl_setopt($ch, CURLOPT_SSLKEYPASSWD, self::PASSWORD);

//        curl_setopt($ch, CURLOPT_VERBOSE, false);
//        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, str_replace('&', '&', self::PASSWORD));
//        curl_setopt($ch, CURLOPT_FORBID_REUSE, TRUE);
//        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);

        $dt = curl_exec($ch);
        if (curl_errno($ch)) {
            return [curl_errno($ch), curl_error($ch)];
        } else {
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($code !== 200) {
                return [$code, 'Ошибка <b>'.$code.'</b> при отправке запроса!'];
            } else {
                return [0, $dt];
            }
        }
    }

    /**
     * Кодирование данных
     *
     * @param type $data - XML структура запроса
     * @return type
     */
    private function _createPKCS7($data)
    {
        file_put_contents(__DIR__.'/'.self::FILE_IN, $data);
        file_put_contents(__DIR__.'/'.self::FILE_OUT, '');

        system('openssl smime -sign -in '.__DIR__.'/'.self::FILE_IN.' -out '.__DIR__.'/'.self::FILE_OUT.' -signer '.__DIR__.'/'.self::PUBLIC_ENCODE_KEY.' -inkey '.__DIR__.'/'.self::PRIVATE_KEY.' -passin pass:'.str_replace('&',
                '\&', self::PASSWORD).' -nodetach -nochain -nocerts -outform PEM');
        return file_get_contents(__DIR__.'/'.self::FILE_OUT);
    }

    /**
     * Декодирование данных
     *
     * @param type $data - ответ сервера
     * @return type
     */
    private function _decrypt_data($data)
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("pipe", "w"),
        );
        $process        = proc_open('openssl smime -verify -inform PEM -nointern -certfile '.self::PUBLIC_KEY.' -CAfile '.self::PUBLIC_KEY, $descriptorspec, $pipes);
        if (is_resource($process)) {
            fwrite($pipes[0], $data);
            fclose($pipes[0]);
            $content = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $resCode = proc_close($process);
            if ($resCode != 0) {
                if ($resCode == 2 || $resCode == 4) {
                    return null;
                }
            }
            return $content;
        }
    }

    /**
     * Выполняет возврат платежа, все деньги возыращаем на счет пользователя
     *
     * @param object $payment
     * @return string
     */
    public function doRefund($payment)
    {

        $this->getSystem(self::PAYMENT_SYSTEM);

        $response = [];

        if ($payment->getAmountRefund() <= 0) {
            $response['error'][] = 'Необходимо указать сумму возврата!';
        }

        if ($payment->getAmountRefund() > $payment->getAmount()) {
            $response['error'][] = 'Cумма возврата не может превышать сумму платежа!';
        }

        if (!isset($response['error'])) {

            $xml   = $this->_generateRefundXML($payment);
            $PKCS7 = $this->_createPKCS7($xml);
            list($error, $dataResponse) = $this->_sendRefundRequest($PKCS7);

            if ($error === 0) {
                $crawler = new Crawler($dataResponse);
                foreach ($crawler as $domElement) {
                    if ($domElement->getAttribute('status') > 0) {
                        if ($domElement->getAttribute('techMessage')) {
                            $response['error'][] = $domElement->getAttribute('techMessage');
                        }
                    }
                }
            } else {
                $response['error'][] = (string) $dataResponse;
            }
        }

        if (!isset($response['error'])) {
            $response['success'][] = 'Возврат выполнен успешно!';
            $this->createRefundPayment($payment);
        }

        $this->log($payment, (isset($response['error']) ? "ОШИБКА:\n".implode("\n", isset($response['error'])) : implode("\n", isset($response['success']))), self::LOG_REFUND);

        return $response;
    }

    /**
     * Генерация XML, возврат платежа, для отрпавки Яндексу
     *
     * @param type $payment
     * @return string
     */
    private function _generateRefundXML($payment)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?> '
            .'<returnPaymentRequest '
            .'clientOrderId="'.($payment->getOrder() ? $payment->getOrder()->getId() : $payment->getId()).'" '
            .'requestDT="'.date('Y-m-d\TH:i:sP').'" '
            .'invoiceId="'.$payment->getId().'" '
            .'shopID="'.$this->system->getShopID().'" '
            .'amount="'.sprintf("%.2f", $payment->getAmount()).'" '
            .'currency="'.($this->system->getIsTest() ? '10' : '').'643" '
            .'cause="'.$payment->getReasonRefund().'" />';
        return $xml;
    }
}