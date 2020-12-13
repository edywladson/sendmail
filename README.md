# SendMail

[![Maintainer](http://img.shields.io/badge/maintainer-@robsonvleite-blue.svg?style=flat-square)](https://twitter.com/edywladson)
[![Source Code](http://img.shields.io/badge/source-edywladson/sendmail-blue.svg?style=flat-square)](https://github.com/edywladson/sendmail)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/edywladson/sendmail.svg?style=flat-square)](https://packagist.org/packages/edywladson/sendmail)
[![Latest Version](https://img.shields.io/github/release/edywladson/sendmail.svg?style=flat-square)](https://github.com/edywladson/sendmail/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/edywladson/sendmail.svg?style=flat-square)](https://scrutinizer-ci.com/g/edywladson/sendmail)
[![Quality Score](https://img.shields.io/scrutinizer/g/edywladson/sendmail.svg?style=flat-square)](https://scrutinizer-ci.com/g/edywladson/sendmail)
[![Total Downloads](https://img.shields.io/packagist/dt/edywladson/sendmail.svg?style=flat-square)](https://packagist.org/packages/cedywladson/sendmail)

###### SendMail is a small component that facilitates sending emails. Simple and easy to use, just enter the data and you're done.

SendMail é um pequeno componente que facilita o envio de e-mails. Simples e fácil de usar, basta inserir os dados e pronto.

### Highlights
- Simple installation (Instalação simples)
- Easy to use and send email (Fácil utilização e envio de e-mail)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation
Uploader is available via Composer:

```bash
"edywladson/sendmail": "^1.0"
```

or run

```bash
composer require edywladson/sendmail
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:
Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

#### User endpoint:

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

use EdyWladson\SendMail\SendMail;

//Config
$sendmail = new SendMail(
    "Host",
    "Port",
    "User",
    "Pass",
    "Lang", //default "en"
    "Secure", //default "tls"
    "Charset", //default "utf-8"
    "Html", //default "true"
    "Auth", //defautl "true"
);

//Mail Data
$sendmail->mail(
    "Subject",
    "Body",
    "Recipient Mail",
    "Recipient Name"
);

//Test and Result
if (!$sendmail->send("From Mail", "From Name")){
    echo $sendmail->message();
}else{
    echo "Email successfully sent!";
}
```
## Contributing

Please see [CONTRIBUTING](https://github.com/edywladson/sendmail/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email edywladson@gmail.com instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para edywladson@gmail.com em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Edy Wladson](https://github.com/edywladson) (Developer)
- [All Contributors](https://github.com/edywladson/sendmail/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/edywladson/sendmail/blob/master/LICENSE) for more information.