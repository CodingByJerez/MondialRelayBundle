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
                ->children()
                     ->scalarNode('customer_code')->isRequired()->cannotBeEmpty()->info("demo: BDTEST  ")->end()
                     ->scalarNode('brand_id')->isRequired()->cannotBeEmpty()->info("demo: 11")->end()
                     ->scalarNode('secret_key')->isRequired()->cannotBeEmpty()->info("demo: MondiaL_RelaY_44")->end()
                     ->scalarNode('user')->isRequired()->cannotBeEmpty()->info("demo: BDTEST@business-api.mondialrelay.com")->end()
                     ->scalarNode('password')->isRequired()->cannotBeEmpty()->info("demo: ****")->end()
                     ->end()
                ->end()
                ->arrayNode('adresse_commerce')
                ->children()
                     ->scalarNode('language')->isRequired()->cannotBeEmpty()->info("Code language format ISO")->end()
                     ->scalarNode('identite')->isRequired()->cannotBeEmpty()->info("Nom du commerce")->end()
                     ->scalarNode('identite_complement')->isRequired()->info("Nom du commerce")->end()
                     ->scalarNode('adresse')->isRequired()->isRequired()->info("Adresse du commerce")->end()
                     ->scalarNode('adresse_complement')->isRequired()->info("Adresse du commerce (option)")->end()
                     ->scalarNode('code_postal')->isRequired()->cannotBeEmpty()->info("code postal")->end()
                     ->scalarNode('ville')->isRequired()->cannotBeEmpty()->info("Ville")->end()
                     ->scalarNode('pays_code')->isRequired()->cannotBeEmpty()->info("code pays format ISO")->end()
                     ->scalarNode('tel')->isRequired()->cannotBeEmpty()->info("Numero de telephone")->end()
                     ->scalarNode('tel2')->isRequired()->info("2eme Numero de telephone (option)")->end()
                     ->scalarNode('courriel')->isRequired()->info("Adresse courriel")->end()

                ->end()
             ->end()
        ;

        return $treeBuilder;
    }
}

