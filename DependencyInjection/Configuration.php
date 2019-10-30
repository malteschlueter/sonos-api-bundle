<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('mschlueter_sonos_api');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('refresh_token')->end()
            ->scalarNode('client_key')->end()
            ->scalarNode('client_secret')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
