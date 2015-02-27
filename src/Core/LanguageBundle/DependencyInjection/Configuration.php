<?php

namespace Core\LanguageBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('core_language');
        //для падежей
        $rootNode
            ->children()    
                ->arrayNode('cases')
                    ->prototype('array')
                        ->prototype('array')
                                ->children()
                                    ->scalarNode('caption')->isRequired()->end()
                                    ->scalarNode('help')->isRequired()->end()
                                ->end()                    
                        ->end()     
                    ->end()         
                ->end()     
            ->end() 
                
            ->children()
                ->arrayNode('languages')->isRequired()
                ->useAttributeAsKey('name')
                ->prototype('array')
                    ->children()
                        ->scalarNode('caption')->isRequired()->end()
                    ->end()
                ->end()
             ->end()
             
                    ->scalarNode('default')->defaultValue('Ru')->end()  //дефолтный язык
                    ->scalarNode('active')->defaultValue('Ru')->end()  //выбранный текущий язык
                    ->scalarNode('classId')->defaultValue('translatedField')->end() //класс идентифицирующий поля в фооме как переводимые

        ->end();

        return $treeBuilder;
    }
}
