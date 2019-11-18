<?php

namespace Amps\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * 
 * @package Amps\AmpsRecaptchaBundle\DependencyInjection
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     * 
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('amps_recaptcha');
        // LE NOM DU ROOTNODE DOIT CORRESPONDRE
        // AU NOM DU BUNDLE EN MINUSCULES
        // EN SNAKECASE
        // ET SANS LE MOT CLE BUNDLE
        // SINON LE CONFIGURATION EST IGNORÉE

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('key')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('secret')->cannotBeEmpty()->isRequired()->end()
            ->end();

        return $treeBuilder;
    }
}
