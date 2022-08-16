# amps/recaptcha-bundle

author: anne marie savary <picsavary@icloud.com>

This project and its code is under MIT License

Required: Symfony 6.0.* - Php 8.1.4

# Work in progress

# RecaptchaBundle for Symfony 6.0.*
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
This bundle provides a google recaptcha submit type you can use in your projects as this (eg.):
```php
.../...
use Amps\RecaptchaBundle\Type\RecaptchaSubmitType;

class contactType extends AbstractType
{
    .../...
   $builder->add('captcha',
                RecaptchaSubmitType::class ,
                [
                    'label' => 'Send',
                    'attr' => [
                        'class' => 'btn btn-default'
                    ]
                ]
            )
            ;
.../...
}
```
## Test with ./vendor/bin/simple-phpunit
## Thanks
Thanks to Google Recaptcha https://www.google.com/recaptcha/intro/v3.html.

Thanks to Grafikart

## Contributing
Of course, open source is fueled by everyone's ability to give just a little bit
of their time for the greater good. 
Please feel comfortable submitting issues or pull requests: all contributions
and questions are warmly appreciated :).
