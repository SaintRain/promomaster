<?php

/**
 * Конфигурации для бандла
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('core_payment', 'array');
//        $rootNode
//            ->children()
//                ->integerNode('credit_limit')
//                    ->isRequired()
//                    ->cannotBeEmpty()
//                ->end()
//            ;
        return $treeBuilder;
    }

}
