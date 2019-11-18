<?php

namespace Amps\RecaptchaBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AmpsRecaptchaBundle extends Bundle {

    public function build(ContainerBuilder $container)
    {
        // SEE https://symfony.com/doc/current/service_container/compiler_passes.html
        
        parent::build($container);
        $container->addCompilerPass(new RecaptchaCompilerPass());
    }

}
