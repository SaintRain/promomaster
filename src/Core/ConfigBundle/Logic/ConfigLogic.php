<?php

/**
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ConfigBundle\Logic;

class ConfigLogic
{

    private $em;
    private $allConfig;
    private $config;
    private $isConfigLoaded = false;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function get($key)
    {
        if (!$this->isConfigLoaded) {
            $this->init();
        }

        if (isset($this->config[$key])) {
            $res = $this->config[$key];
        } else {
            if (isset($this->allConfig[$key])) {
                if ($this->allConfig[$key]->getType() == 'array') {
                    $mas = explode("\n", $this->allConfig[$key]->getData());
                    $config = [];
                    $ind = 0;
                    foreach ($mas as $m) {
                        if ($ind == 1) {                            
                            $config[$k] = trim($m);
                            $ind = 0;
                        } else {
                            $k = trim($m);
                            $ind++;
                        }
                    }                                        
                    $this->config[$key] = $config;
                    $res = $this->config[$key];
                } else {
                    $res = $this->allConfig[$key]->getData();
                }
            } else {
                $res = false;
            }
        }
        return $res;
    }

    /**
     * Берём из базы все настройки
     */
    protected function init()
    {
        $this->allConfig = $this->em->getRepository('CoreConfigBundle:Config')->getAllByIndexName();
        $this->isConfigLoaded=true;
    }

}
