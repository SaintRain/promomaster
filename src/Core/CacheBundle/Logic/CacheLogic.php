<?php
/**
 * Логика для продукта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CacheBundle\Logic;

use Beryllium\CacheBundle\Cache;
use Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine;
use Symfony\Bundle\TwigBundle\TwigEngine;

use Symfony\Component\Security\Core\SecurityContext;


class CacheLogic
{
    //Названия тегов собраны в одном месте
    STATIC $TAG_FOOTER = 'FOOTER';
    STATIC $TAG_BRANDS = 'BRANDS';
    STATIC $TAG_PHONES = 'PHONES';
    STATIC $TAG_PAYMENT_SYSTEM = 'PAYMENT_SYSTEM';
    STATIC $TAG_DELIVERY_SYSTEM = 'DELIVERY_SYSTEM';
    STATIC $TAG_CATEGORIES = 'CATEGORIES';
    STATIC $TAG_PROPERTIES = 'PROPERTIES';


    CONST CACHE_TIMEOUT_ONE_HOUR = 3600;
    CONST CACHE_TIMEOUT_ONE_DAY = 86400;
    CONST CACHE_PREFIX = '__cache:';

    private $cache;
    private $templating;
    private $securityContext;

    public function __construct(Cache $cache, TwigEngine $templating, SecurityContext $securityContext)
    {
        $this->cache = $cache;
        $this->templating = $templating;
        $this->securityContext = $securityContext;
    }

    /**
     * Устанавливает новое зачение в кеш
     * @param $keys
     * @param $content
     * @param $timeout
     * @param bool $private
     * @return mixed
     */
    public function set($key, $userTags = null, $content, $timeout, $private)
    {
        //проверяем, чтоб теги были собраны в одном месте
//        foreach($userTags as $tag) {
//
//        }
        //$this->cache->flush();$this->cache->delete($this::CACHE_PREFIX);
        $time_start = microtime(1);

        //если тег не задан, то создаем его из ключа
        if (!$userTags) {
            $userTags = [
                0 => $key
            ];
        }

        list($hash_key, $hash_key_clean, $privateKey) = $this->generateHashKeys($key, $private);
        $tags = $this->generateTags($hash_key_clean, $privateKey, $userTags, $timeout);

        //берем или создаём карту
        if (!$map = $this->getMap()) {
            $map = [];
        }

//        //заносим ключ в карту
//        for ($i=0; $i<20000; $i++) {
//            $tags[]=['251d164643533a527361dbe1a7b9235d'];
//        }
        $map = array_replace_recursive($map, $tags);
        $this->setMap($map);

        //пишем значение по ключу
        $res = $this->cache->set($hash_key, $content, $timeout);


        $time_end = microtime(1);        // Конец подсчета времени
        $time = $time_end - $time_start;
        //ldd($map);
        //ldd($time);
        return $res;
    }

    /**
     * Читает из кеша
     * @param $keys
     * @param $private
     * @return mixed
     */
    public function get($key, $private)
    {
        list($hash_key) = $this->generateHashKeys($key, $private);
        return $this->cache->get($hash_key);
    }

    public function removeByKey($key, $private, $forceUserId = null)
    {
        list($hash_key, $hash_key_clean, $privateKey) = $this->generateHashKeys($key, $private, $forceUserId);

        //убираем из карты
        if ($map = $this->getMap()) {
            foreach ($map as $tag_key => $tag) {
                if ($privateKey) {
                    if (isset($tag[$privateKey]) && isset($map[$tag_key][$privateKey][$hash_key])) {
                        unset ($map[$tag_key][$privateKey][$hash_key]);
                    }
                } else {
                    if (isset($tag[$hash_key])) {
                        unset ($map[$tag_key][$hash_key]);
                    }
                }
            }
        }
        $this->setMap($map);

        $this->cache->delete($hash_key);
    }


    public function removeByTag($userTags, $private, $forceUserId = null)
    {
        if (!is_array($userTags)) {
            $userTags = [
                0 => $userTags
            ];
        }

        if (!$forceUserId) {
            if ($private) {
                $privateKey = $this->getPrivateTag();
            } else {
                $privateKey = false;
            }
        } else {
            $privateKey = $forceUserId;
        }

        //убираем из карты ключи
        $del_by_hash_keys = [];
        if ($map = $this->getMap()) {
            foreach ($userTags as $tag) {
                if (isset($map[$tag])) {
                    if ($privateKey) {
                        if (isset($map[$tag][$privateKey])) {
                            $del_by_hash_keys = array_merge($del_by_hash_keys, $map[$tag][$privateKey]);
                            unset ($map[$tag][$privateKey]);
                        }
                    } else {
                        if (isset($map[$tag])) {
                            $del_by_hash_keys = array_merge($del_by_hash_keys, $map[$tag]);
                            unset ($map[$tag]);
                        }
                    }
                }
            }
            $this->setMap($map);

            //удаляем по ключам кеш
            foreach ($del_by_hash_keys as $d_hash_key => $val) {
                $this->cache->delete($d_hash_key);
            }
        }
    }

    /**
     * Генерирует HASH ключи по которому будет храниться кеш
     * @param $key
     * @param $private
     * @param null $forceUserId
     * @throws \Exception
     */
    private function generateHashKeys($key, $private, $forceUserId = null)
    {
        //генерируем ключ
        if (!$forceUserId) {
            if ($private) {
                $privateKey = ':'.$this->getPrivateTag();
            } else {
                $privateKey = '';
            }
        } else {
            $privateKey = ':'.$forceUserId;
        }

        $hash_key_clean = md5($key . $privateKey);
        $hash_key = $this::CACHE_PREFIX . $hash_key_clean;
        return [$hash_key, $hash_key_clean, $privateKey];
    }


    /**
     * Генерирует ключ, по которому будет храниться кеш и массив тегов
     * @param $keys
     * @param $private
     * @param $generateTags =false
     * @param $forceUserId =null
     * @return array
     * @throws \Exception
     */
    private function  generateTags($hash_key_clean, $privateKey, array $userTags, $timeout)
    {
        //формируем массив тегов
        $tags = [];
        foreach ($userTags as $uTag) {
            if ($privateKey) {
                $tags[$uTag][$privateKey][$hash_key_clean] = time()+$timeout;
            } else {
                $tags[$uTag][$hash_key_clean] = time()+$timeout;
            }
        }
        return $tags;
    }

    private function setMap($map)
    {
        return $this->cache->set($this::CACHE_PREFIX, $map, 0);
    }

    public function getMap()
    {
        return $this->cache->get($this::CACHE_PREFIX);
    }

    /**
     * Возвращает приватный тег взависимости от пользователя
     * @return mixed
     * @throws \Exception
     */
    private function getPrivateTag()
    {
        $user = $this->securityContext->getToken()->getUser();
        if (is_object($user) && $user->getId()) {
            $privateTag = $user->getId();
        } else {
            throw new \Exception('Cannot get private tag!');
        }

        return $privateTag;
    }
}