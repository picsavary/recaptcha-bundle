<?php

namespace Amps\RecaptchaBundle\Type;

use Amps\RecaptchaBundle\Constraints\Recaptcha;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecaptchaSubmitType extends AbstractType
{

    /**
     * @var string
     *
     */
    private $key;

    /**
     * RecaptchaSubmitType constructor.
     * @param string $key
     * 
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([
            // CE CHAMP N'EST PAS RELIÉ
            // À UNE INFORMATION DANS NOTRE OBJET REPRÉSENTANT LES DONNÉES
            'mapped' => false,
            'constraints' => new Recaptcha()
        ]);
    }

    public function buildView(
        FormView $view,
        FormInterface $form,
        array $options
    ) : void {
        // REDEFINIR LA VARIABLE LABEL, METTRE À FALSE
        // POUR EVITER QUE LE TEXTTYPE NE METTE EN DOUBLE
        // LE BOUTON ENVOYER
        $view->vars['label'] = false;
        $view->vars['key'] = $this->key;
        // ET, POUR LES PARAMETRES ENVOYÉS AU SUBMIT_WIDGET :
        $view->vars['button'] = $options['label'];
    }

    public function getBlockPrefix(): string
    {
        return 'recaptcha_submit';
    }

    public function getParent(): ?string
    {
        // LE TEXTTYPE (PLUTÔT QUE LE SUBMITTYPE)
        // MET EN PLACE LE SYSTÈME DE VALIDATION
        // DONT ON VA AVOIR BESOIN
        
        return TextType::class;
    }

}
