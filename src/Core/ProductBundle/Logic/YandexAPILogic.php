<?php

/**
 * Логика для работы с яндексом
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Logic;

class YandexAPILogic {

    const URL_WEBMASTER_API = 'https://webmaster.yandex.ru/api/v2';
    const WEBMASTER_HOST = 'webmaster.yandex.ru';

    private $em;
    private $templating;
    private $configs;
    private $initialized = false;
    private $_hosts_url;
    private $_current_site_id;
    private $_oauth_token;
    private $host;

    public function __construct($templating, $em, $config_logic, $parameters) {
        $this->templating = $templating;
        $this->em = $em;
        $this->configs = $config_logic->get('yandex-api');
        $this->parameters=$parameters;                
        $this->host = $parameters['domain_ru'];
        
//        $this->host ='www.olikids.ru';

//        $_SERVER['SERVER_NAME'];
    }

    public function init() {
        if (!$this->initialized) {
            $this->initialized = true;
            $this->getHostsUrl($this->configs['oauth_token']);
            $this->setCurrentSite($this->host);
        }
    }

    public function getHostsUrl($oauth_token) {
        $this->_oauth_token = $oauth_token;
        $service_doc = $this->_request(self::URL_WEBMASTER_API);
        if ($service_doc['result_status'] == 200) {

            if ($service_doc['result_body'] instanceof \SimpleXMLElement) {
                $res = $service_doc['result_body']->xpath('//workspace/collection/@href');
                $host_url = array_shift($res);

                if ($host_url->href) {
                    $this->_hosts_url = '' . $host_url->href;
                }
            }
        }
    }

    public function setCurrentSite($site) {
        $this->_current_site_id = NULL;
        if (!$this->_hosts_url) {
            return false;
        }
        $host_lists = $this->_request($this->_hosts_url);
        if ($host_lists['result_status'] == 200) {
            if ($host_lists['result_body'] instanceof \SimpleXMLElement) {
                foreach ($host_lists['result_body']->xpath('//hostlist/host') as $host) {
                    if ($host->name && $host->name == $site) {
                        $site_href = '' . $host->attributes()->href;
                        if (preg_match('/\d+$/', $site_href, $match)) {
                            $this->_current_site_id = $match[0];
                        }
                        break;
                    }
                }
            }
        }
    }

    public function sendOriginalText($text) {
        $text=  str_replace('&', '&amp;', html_entity_decode(strip_tags($text)));        
        
        $this->init();
        if (!$this->_current_site_id) {
            return false;
        }
        $text_response = $this->_request(
                $this->_hosts_url . '/' . $this->_current_site_id . '/original-texts/', '<original-text><content>' . $text . '</content></original-text>', 'POST'
        );

        return $this->xml2array($text_response);
    }

    private function _request($URL, $data = '', $Method = 'GET') {
        $response_obj = array();

        $Method = strtoupper($Method);
        if ($Method == 'GET') {
            $URL .= (strpos($URL, '?') === false ? '?' : '&') . $data;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Host: ' . self::WEBMASTER_HOST,
            'Authorization: OAuth ' . $this->_oauth_token
        ));

        if ($Method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($data));
        }
        /* elseif($Method == 'PUT') {
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Params));
          } */

        $response_obj['result_body'] = simplexml_load_string(curl_exec($ch));
        $response_obj['result_status'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $response_obj;
    }

    public function xml2array($xmlObject, $out = array()) {
        foreach ((array) $xmlObject as $index => $node)
            $out[$index] = ( is_object($node) ) ? $this->xml2array($node) : $node;

        return $out;
    }

}
