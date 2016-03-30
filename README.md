# ApiUtils (Laravel 5 Package)

[![Latest Stable Version](https://poser.pugx.org/beautycoding/apiutils/v/stable)](https://packagist.org/packages/beautycoding/apiutils) [![Total Downloads](https://poser.pugx.org/beautycoding/apiutils/downloads)](https://packagist.org/packages/beautycoding/apiutils) [![Latest Unstable Version](https://poser.pugx.org/beautycoding/apiutils/v/unstable)](https://packagist.org/packages/beautycoding/apiutils) [![License](https://poser.pugx.org/beautycoding/apiutils/license)](https://packagist.org/packages/beautycoding/apiutils)

In order to install Laravel 5 ApiUtils, just add

    "beautycoding/apiutils": "dev-master"

to your composer.json. Then run `composer install` or `composer update`,

or just type in terminal:

`composer require beautycoding/apiutils`

Then in your `config/app.php` add
```php
    BeautyCoding\ApiUtils\Providers\ApiUtilsServiceProvider::class,
```

Publish config:

```php
    php artisan vendor:publish
```

Edit config file `config/apiutils.php` to set default response type.
You can write and set own class
