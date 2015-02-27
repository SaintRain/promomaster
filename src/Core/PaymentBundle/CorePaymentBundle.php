<?php
/**
 * Бандл для выполнения платежей
 *
 * Платежные системы с которыми работает бандл:
 * Robokassa (key: Robokassa)
 *   http://www.robokassa.ru/ru/HowTo.aspx
 *   http://test.robokassa.ru/Webservice/Service.asmx/GetCurrencies?MerchantLogin=olikids&Language=ru
 * WebMoney (key: WebMoney)
 *   http://wiki.webmoney.ru/projects/webmoney/wiki/Web_Merchant_Interface
 * Qiwi (key: Qiwi)
 * Яндекс деньги (key: YandexMoney)
 *   http://www.slideshare.net/ssuser5007f3/1-15300598
 *   http://www.slideshare.net/ssuser5007f3/ss-14416857
 * Пластиковые карты (через Яндекс деньги) (key: PlasticCard)
 * Пластиковые карты (через Терминал) (key: PlasticCardTerminal)
 * Банковский платёж и сбербанк квитанция (key: BankTransfer)
 * Наложенный платёж (key: PaymentOnDelivery)
 * PayPal (key: PayPal)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CorePaymentBundle extends Bundle
{

}