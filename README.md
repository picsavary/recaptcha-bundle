# lorem-ipsum-bundle

author: anne marie savary <picsavary@mac.com>

This project and its code is under MIT License

Required: Symfony ^4.3 - Php ^7.2

# Work in progress

# RecaptchaBundle for Symfony ^4.3
• RecaptchaBundle is a way for you to use Google Recaptcha v3 invisible protection in your Symfony ^4.3 application.
• Load RecaptchaBundle project files near you projects' and set it *real* path in your projects' composer.json file, eg:
```console
"repositories": [
        {
            "type": "path",
            "url": "../../RecaptchaBundle"
        }
    ]
```
## Configuration
In your projects, create a new `config/packages/amps_recaptcha.yaml` file. The
default values are:
```yaml
# config/packages/amps_recaptcha.yaml
amps_recaptcha:
    key: 'yourgooglerecaptchakey'
    secret: 'yourgooglerecaptchasecret'
```
You'll get these keys on google recaptcha admin console.
You'll also declare your domains there.

## Install the package
• Then Install the package with:
```console
composer require "amps/recaptcha-bundle":"*@dev"
```
And... that's it! If you're *not* using Symfony Flex, you'll also
need to enable the `Amps\RecaptchaBundle\AmpsRecaptchaBundle`
in your `AppKernel.php` file.
## Usage
This bundle provides a google recaptcha submit type :
```php
.../...
use Amps\RecaptchaBundle\Type\RecaptchaSubmitType;

class contactType extends AbstractType
{
    .../...
   $builder->add('captcha',
                // PEU IMPORTE LE NOM,
                // CAR RECAPTCHASUBMITTYPE N’EST PAS MAPPÉ
                RecaptchaSubmitType::class ,
                [
                    'label' => 'Envoi',
                    'attr' => [
                        'class' => 'btn bg_navigation'
                    ]
                ]
            )
            ;
.../...
}
```
You can also access this service directly using the id
`amps_recaptcha-bundle`.

## Thanks
Thanks to Google Recaptcha https://www.google.com/recaptcha/intro/v3.html.
Thanks to Grafikart https://www.grafikart.fr/tutoriels/recaptcha-bundle-1094

## Contributing
Of course, open source is fueled by everyone's ability to give just a little bit
of their time for the greater good. 
Please feel comfortable submitting issues or pull requests: all contributions
and questions are warmly appreciated :).