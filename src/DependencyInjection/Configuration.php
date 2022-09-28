<?php
/*
 * This file is part of the pushull-translation-provider package.
 *
 * (c) 2022 m2m server software gmbh <tech@m2m.at>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pushull\PushullTranslationProvider\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('pushull_translation_provider');

        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('https')
                    ->defaultTrue()
                ->end()
                ->booleanNode('verify_peer')
                    ->defaultTrue()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
