<?php
namespace Amps\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AmpsRecaptchaExtension extends Extension
{
    // LA CLASSE DOIT PORTER LE NOM DU BUNDLE SANS BUNDLE
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @return void
     * @throws \Exception
     * When provided tag is not defined in this extension
     */
    public function load(
        array $configs,
        ContainerBuilder $container
    )
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config') );
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        /* KEY ET SECRET :
        CONFIG['KEY'] ET CONFIG['SECRET']
        SONT LUS DANS LA MAIN APP QUI FOURNIT KEY ET SECRET DANS son FICHIER CONFIG/PACKAGES/AMPS_RECAPTCHA.YAML : amps_recaptcha.key et amps_recaptcha.secret
        [ TAKEN FROM CONTAINER WHICH LOADS EVERY CONFIGURATIONS,
        THESE CONF PARAMETERS OR ARGUMENTS ARE LOADED
        FROM MAIN APP CONFIG/PACKAGES/AMPS_RECAPTCHA.YAML FILE]
        */
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
