<?php
namespace Amps\RecaptchaBundle\Tests;

use Amps\RecaptchaBundle\AmpsRecaptchaBundle;
use Amps\RecaptchaBundle\Type\RecaptchaSubmitType;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use ReCaptcha\ReCaptcha;


class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {
        $ReCaptcha = $this->createMock(ReCaptcha::class);

        $kernel = new AmpsRecaptchaBundleTestingKernel(
            [
                'key' => 'recaptchakey',
                'secret' => 'yoursecretkey'
            ]
        );
        $kernel->boot();
        $container = $kernel->getContainer();
        $this->assertInstanceOf(
            RecaptchaSubmitType::class,
            $container->get('amps_recaptcha.type')
        );


    }

}

class AmpsRecaptchaBundleTestingKernel extends Kernel
{
    private $ampsRecaptchaBundleConfig;

    public function __construct(array $ampsRecaptchaBundleConfig = [])
    {
        $this->ampsRecaptchaBundleConfig = $ampsRecaptchaBundleConfig;
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new AmpsRecaptchaBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function(ContainerBuilder $container) {
            // $container->register('amps_recatcha.type', RecaptchaSubmitType::class);
            // $container->register('amps_recatcha.validator', RecaptchaSubmitType::class);
            $container->loadFromExtension('amps_recaptcha', $this->ampsRecaptchaBundleConfig);
        });
    }
    public function getCacheDir()
    {
        return __DIR__.'/../../var/cache/test/'.spl_object_hash($this);
    }
}
