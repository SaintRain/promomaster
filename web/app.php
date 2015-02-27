<?php

/**
 * Точка входа для продакшена
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
use Symfony\Bundle\TwigBundle\Controller\ExceptionController;
use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Parser as YamlParser;

//apc_clear_cache('user');
$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';

$app_dir = __DIR__ . '/../app/';
$yaml = new YamlParser();
$params = $yaml->parse(file_get_contents($app_dir . 'config/parameters.yml'));

// Use APC for autoloading to improve performance.
// Change 'sf2' to a unique prefix in order to prevent cache key conflicts
// with other applications also using APC.
$loader = new ApcClassLoader($params['parameters']['domain_ru'], $loader);
$loader->register(true);


require_once __DIR__ . '/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
$kernel = new AppCache($kernel);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
