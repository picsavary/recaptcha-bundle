<?php
namespace Amps\RecaptchaBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RecaptchaCompilerPass implements CompilerPassInterface {

    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('twig.form.resources')) {
            $resources = $container->getParameter('twig.form.resources') ?: [];
            // @AmpsRecaptcha est visible sur php bin/console debug:twig
            // par convention, le field est reconnu par twig
            // s’il est dans le dossier Resources/views
            array_unshift($resources, '@AmpsRecaptcha/fields.html.twig');
            $container->setParameter('twig.form.resources', $resources);
        }
    }
}
