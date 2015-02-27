<?php

namespace Core\DynamicBindingBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('core_dynamic_binding');
        //для падежей
        $rootNode
            ->children()    
                ->arrayNode('binding')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('long')
                                ->isRequired()
                            ->end()
                            ->scalarNode('property')
                                ->isRequired()
                            ->end()
                            ->arrayNode('grant')
                                ->isRequired()
                                ->prototype('scalar')
                                ->end()
                            ->end()
                        ->end()                    
                    ->end()         
                ->end()     
            ->end() 
        ->end();

        return $treeBuilder;
    }
}
