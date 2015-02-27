<?php

/**
 * Сервис для запуска консольных процессов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Logic;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;

class ProcessLogic
{
    protected $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }


    /**
     * Запускает асинхроно консольную команду Symfony
     * @param $command
     * @return string
     */
    public function runAppConsole($command)
    {
        //запускаем крон асинхронно
        $command='cd '. $this->kernel->getRootDir().'; '.PHP_BINDIR.'/php console '.$command.'> /dev/null 2>/dev/null &';
        $process = new Process($command);
        $process->start();
        $output=$process->getErrorOutput();
        return $output;
    }


}
