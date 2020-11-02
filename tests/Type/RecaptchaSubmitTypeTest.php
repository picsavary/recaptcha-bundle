<?php
namespace Amps\RecaptchaBundle\Tests\Type;

use Amps\RecaptchaBundle\Type\RecaptchaSubmitType;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RequestStack;


class RecaptchaSubmitTypeTest extends TestCase
{
    /**
     * @var RecaptchaSubmitType
     *
     */
    protected $type;
    /**
     * @var FormView
     */
    private $view;

    protected function setUp(): void
    {
        $this->view = new FormView();
        $requestStack = $this->createMock(RequestStack::class);
        $this->type = new RecaptchaSubmitType('recaptchakey');
    }

    public function testbuildView()
    {
        $form = $this->createMock(FormInterface::class);
        // $this->assertArrayNotHasKey('label', $view->vars);
        $this->assertArrayNotHasKey('button', $this->view->vars);
        $this->assertArrayNotHasKey('label', $this->view->vars);
        $this->assertArrayNotHasKey('key', $this->view->vars);
        $this->type->buildView(
            $this->view,
            $form,
            ['label' => false,]
        );
        $this->assertArrayHasKey('button', $this->view->vars);
        $this->assertArrayHasKey('label', $this->view->vars);
        $this->assertArrayHasKey('key', $this->view->vars);

        $this->assertFalse($this->view->vars['label']);
        $this->assertEquals('recaptchakey', $this->view->vars['key']);

    }

    public function testgetParent()
    {
        $this->assertSame(
            TextType::class,
            $this->type->getParent()
        );
    }

    public function testgetBlockPrefix()
    {
        $this->assertEquals('recaptcha_submit', $this->type->getBlockPrefix());
    }
}