# Laminas-Bugsnag

## [Bugsnag](https://bugsnag.com) Notifier for [Laminas Framework](https://getlaminas.org/)

**This package is a fork of [itakademy/laminas-bugsnag](https://github.com/itakademy/laminas-bugsnag) which is a fork of [nickurt/zf-bugsnag](https://github.com/nickurt/zf-bugsnag). We forked it to our own organization to remove older compatibility that makes it easier to update dependencies and code. Thanks to both of these projects for the foundation work.**

### Bugsnag?
The [Bugsnag](https://bugsnag.com) Notifier for [Laminas Framework](https://getlaminas.org/) gives you instant notifications of the errors in your application. You can create a free plan/account on the [bugsnag](https://bugsnag.com) website.

### Install
#### Installation with composer

```shell
php composer.phar require diablomedia/laminas-bugsnag
```

or with global composer install :

```shell
composer require diablomedia/laminas-bugsnag
```

### Requirements

* PHP 7.4.0 to 8.1.x
* [Laminas](https://getlaminas.org/)
* [Bugsnag PHP-API](https://github.com/bugsnag/bugsnag-php) (version 3.23.1 minimum)

### Post Installation

Enable it in your  `./config/modules.config.php` file
```php
<?php

// modules.config.php
return [
    'LaminasBugsnag', // Must be added as the first module

    // ...
];
```

### Configuration

Copy the `./vendor/diablomedia/laminas-bugsnag/config/laminasbugsnag.local.php.dist` file to `./config/autoload/laminasbugsnag.local.php`  and customize the settings (IsEnabled, ApiKey, ...).
