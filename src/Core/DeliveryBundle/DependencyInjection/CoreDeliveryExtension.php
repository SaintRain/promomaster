<?php

namespace Core\DeliveryBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CoreDeliveryExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);    //возвращаем конфиги в нужном формате

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $arr = array();
        foreach($config as $company => $val) {
            foreach($val as $key => $options) {
                $parameter = 'core_delivery.' . $company . '.' . $key;
                $container->setParameter($parameter, $options);
            }
        }
        //устанавливаем значение параметра
        $container->setParameter('core_delivery.cdek.options', $config['cdek']['options']);
    }
}
