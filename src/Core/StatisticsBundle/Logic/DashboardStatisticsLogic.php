<?php

/**
 * Логика статистики для вывода на главной странице админки
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\Request;
use Liip\MonitorBundle\Helper\ArrayReporter;

class DashboardStatisticsLogic
{

    protected $timezone; // часовой пояс, получаем из parameters.yml
    protected $timeOffsetInSeconds; // смещение по часовому поясу в секундах, вычисляется в конструкторе
    protected $em;
    protected $session;
    protected $auditReader; // сервис для нахождения изменений в сущностях
    protected $monitorRunner;

    public function __construct($timezone, $em, $session, $auditReader, $monitorRunner)
    {

        $dateTime = new \DateTime('now', new \DateTimeZone($timezone));
        $this->timezone = $timezone;
        $this->timeOffsetInSeconds = $dateTime->getOffset();

        $this->em = $em;
        $this->session = $session;
        $this->auditReader = $auditReader;
        $this->monitorRunner = $monitorRunner;
    }

    public function getGeneralStatistics()
    {

        $generalOrdersStatistics = $this->em->getRepository('CoreOrderBundle:Order')->getGeneralStatistics();
        $generalUserStatistics = $this->em->getRepository('ApplicationSonataUserBundle:User')->getGeneralStatistics();
        $generalTroubleTicketStatistics = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->getGeneralStatistics();
        $generalPaymentStatistics = $this->em->getRepository('CorePaymentBundle:Payment')->getGeneralStatistics();

        $chartOrder = $this->em->getRepository('CoreOrderBundle:Order')->getChartStatistics();
        $chartUser = $this->em->getRepository('ApplicationSonataUserBundle:User')->getChartStatistics();

        $seriesOptions = [
            0 => ['animation' => false, 'caption' => 'Новых заказов', 'name' => 'total_quantity', 'data' => []],
            1 => ['animation' => false, 'caption' => 'Оплачено заказов', 'name' => 'total_paid_quantity', 'data' => []],
            2 => ['animation' => false, 'caption' => 'Отменено заказов', 'name' => 'total_canceled_quantity', 'data' => []],
            3 => ['animation' => false, 'caption' => 'Новых польз-лей', 'name' => 'total_user_quantity', 'data' => []],
        ];

        $dates = [];
        $orders = [];
        foreach ($chartOrder as $c) {
            $orders[$c['date']] = $c;
            $dates[$c['date']] = $c['date'];
        }
        unset($chartOrder);

        $users = [];
        foreach ($chartUser as $c) {
            $users[$c['date']] = $c['total_user_quantity'];
            $dates[$c['date']] = $c['date'];
        }
        unset($chartUser);
        // показывает график по текущую дату
        if (!isset($dates[date('Y-m-d')])) {
            $dates[date('Y-m-d')] = date('Y-m-d');
        }
        sort($dates);
        
        foreach ($dates as $d) {
            $date_int = (strtotime($d) + $this->timeOffsetInSeconds) * 1000;
            //проставляем заказы
            for ($key = 0; $key < 3; $key++) {
                if (isset($orders[$d])) {
                    $value = $orders[$d][$seriesOptions[$key]['name']];
                } else {
                    $value = 0;
                }

                $seriesOptions[$key]['data'][] = [$date_int, $value];
            }
            //клеим юзеров к заказам
            if (isset($users[$d])) {
                $value = $users[$d];
            } else {
                $value = 0;
            }
            $seriesOptions[3]['data'][] = [$date_int, $value];
        }


        //состояние системы
        $reporter = new ArrayReporter();
        $this->monitorRunner->addReporter($reporter);
        $this->monitorRunner->run();
        $healthOfSystem = $reporter->getResults();
        //переводы
        foreach ($healthOfSystem as $key => $h) {
            switch ($h['service_id']) {
                case 'php_extensions':
                    $healthOfSystem[$key]['label'] = 'Расширения';
                    break;
                case 'disk_usage':
                    $healthOfSystem[$key]['label'] = 'Использование жесткого диска';
                    break;
                case 'symfony_requirements':
                    $healthOfSystem[$key]['label'] = 'Требования Symfony';
                    break;
                case 'apc_memory':
                    $healthOfSystem[$key]['label'] = 'Кеш APC';
                    break;
                case 'apc_fragmentation':
                    $healthOfSystem[$key]['label'] = 'Фрагментация APC';
                    break;
                case 'custom_error_pages':
                    $healthOfSystem[$key]['label'] = 'Страницы ошибок';
                    break;
                case 'security_advisory':
                    $healthOfSystem[$key]['label'] = 'Безопасность';
                    break;
                case 'php_version_5.4.4':
                    $healthOfSystem[$key]['label'] = 'PHP-версия';
                    break;
                case 'doctrine_dbal_default_connection':
                    $healthOfSystem[$key]['label'] = 'Соединение БД (Slave)';
                    break;
                case 'doctrine_dbal_force_master_connection':
                    $healthOfSystem[$key]['label'] = 'Соединение БД (Master)';
                    break;
                case 'memcache_name':
                    $healthOfSystem[$key]['label'] = 'Соединение Memcache';
                    break;
                case 'http_service_name':
                    $healthOfSystem[$key]['label'] = 'HTTP-сервис';
                    break;
            }
        }

        $res = [
            'generalOrdersStatistics' => $generalOrdersStatistics,
            'generalUserStatistics' => $generalUserStatistics,
            'generalTroubleTicketStatistics' => $generalTroubleTicketStatistics,
            'generalPaymentStatistics' => $generalPaymentStatistics,
            'seriesOptions' => $seriesOptions,
            'healthOfSystem' => $healthOfSystem
        ];

        return $res;
    }

}
