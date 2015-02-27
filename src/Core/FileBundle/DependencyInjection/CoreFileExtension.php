<?php

namespace Core\FileBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CoreFileExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        if (!isset($config)) {
            throw new \InvalidArgumentException(
            'The "core_file" option must be set'
            );
        }

        if (is_array($config['image'])) {
            foreach ($config['image'] as $ns => $nsArray) {
                foreach ($nsArray as $fn => $fnArray) {
                    $original = array();
                    if (!isset($fnArray['options']['original'])) {
                        $original = array('original' => array('uploaded_file_' => array('size' => array('w' => null, 'h' => null))));
                    }

                    $preview = array();
                    if (!isset($fnArray['options']['preview'])) {
                        $preview = array('preview' => array($config['image'][$ns][$fn]['prefix_preview_in_admin'] => array('size' => array('w' => 64, 'h' => 64))));
                    }

                    $config['image'][$ns][$fn]['options'] = array_merge(
                        $original,
                        $preview,
                        $config['image'][$ns][$fn]['options']
                    );
                }
            }
        }

        $container->setParameter('core_file', $config);
    }

}
