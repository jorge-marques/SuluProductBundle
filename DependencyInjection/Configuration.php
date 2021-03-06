<?php
/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\ProductBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sulu_product');

        $rootNode
            ->children()
                ->scalarNode('fallback_locale')
                    ->defaultValue('en')
                ->end()
                ->arrayNode('locales')
                    ->addDefaultChildrenIfNoneSet()
                    ->prototype('scalar')->defaultValue('en')->end()
                ->end()
                ->scalarNode('template')->defaultValue('ClientWebsiteBundle:views:product.html.twig')->end()
                ->scalarNode('default_currency')->defaultValue('EUR')->end()
                ->arrayNode('fixtures')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('attributes')
                            ->prototype('scalar')->end()
                            ->defaultValue([])
                        ->end()
                    ->end()
                ->end()
            ->end();

        $this->addObjectsSection($rootNode);
        $this->addContentTypes($rootNode);

        return $treeBuilder;
    }

    /**
     * Adds `objects` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addObjectsSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('objects')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('product')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Sulu\Bundle\ProductBundle\Entity\Product')->end()
                                ->scalarNode('repository')
                                    ->defaultValue('Sulu\Bundle\ProductBundle\Entity\ProductRepository')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addContentTypes(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('types')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('product')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('template')
                                ->defaultValue('SuluProductBundle:Template:content-types/product-selection.html.twig')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
