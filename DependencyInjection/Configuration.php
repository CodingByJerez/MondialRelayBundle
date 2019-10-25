<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 17/10/2019
 * Time: 18:20
 */

namespace CodingByJerez\MondialRelayBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('mondial_relay');

         $treeBuilder->getRootNode()

             ->children()
                 ->arrayNode('api_identifiants')
                    ->addDefaultsIfNotSet()
                    ->children()
                         ->scalarNode('customer_code')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('brand_id')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('secret_key')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('user')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
                    ->end()
                ->end()

                 ->arrayNode('adresse_commerce')
                    ->addDefaultsIfNotSet()
                    ->children()
                         ->scalarNode('language')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('identite')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('identite_complement')->isRequired()->end()
                         ->scalarNode('adresse')->isRequired()->isRequired()->end()
                         ->scalarNode('adresse_complement')->isRequired()->end()
                         ->scalarNode('code_postal')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('ville')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('pays_code')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('tel')->isRequired()->cannotBeEmpty()->end()
                         ->scalarNode('tel2')->isRequired()->end()
                         ->scalarNode('courriel')->isRequired()->end()
                    ->end()
                 ->end()
             ->end()
        ;

        return $treeBuilder;
    }
}

