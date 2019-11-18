<?php
namespace Amps\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class AmpsRecaptchaExtension
 * @package Amps\AmpsRecaptchaBundle\DependencyInjection
 *
 * LA CLASSE DOIT PORTER LE NOM DU BUNDLE SANS BUNDLE
 * 
 */
class AmpsRecaptchaExtension extends Extension
{

    /**
     * @param array $configs
     *
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     *
     * Loads a specific configuration.
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     *
     */
    public function load(
        array $configs,
        ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('services.yaml');

        // $configuration = new Configuration();
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        $container
            ->setParameter(
                'amps_recaptcha.key',
                $config['key']
            );

        $container
            ->setParameter(
                'amps_recaptcha.secret',
                $config['secret']
            );
    }
}
