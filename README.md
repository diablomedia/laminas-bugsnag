<a href="https://aimeos.org/">
    <img src="https://www.it-akademy.fr/img/logo.png" alt="IT-Akademy logo" title="IT-Akademy" align="right" height="60" />
</a>

# Laminas-Bugsnag

## [Bugsnag](https://bugsnag.com) Notifier for [Laminas Framework](https://getlaminas.org/)

**This package is a fork of [nickurt/zf-bugsnag](https://github.com/nickurt/zf-bugsnag), which seemed to be inactive for some time. This is a port for [Laminas](https://getlaminas.org/) project. Thank's to [Nickurt](https://github.com/nickurt/) for his job.**

### Bugsnag?
The [Bugsnag](https://bugsnag.com) Notifier for [Laminas Framework](https://getlaminas.org/) gives you instant notifications of the errors in your application. You can create a free plan/account on the [bugsnag](https://bugsnag.com) website.

### Install
#### Installation with the composer

```shell
php composer.phar require itakademy/laminas-bugsnag
```

or with global composer install :

```shell
composer require itakademy/laminas-bugsnag
```

### Requirements

* PHP7.2+
* [Laminas](https://getlaminas.org/)
* [Bugsnag PHP-API](https://github.com/bugsnag/bugsnag-php)

### Post Installation

Enable it in your  `./config/modules.config.php` file
```php
<?php

// modules.config.php
return [
    'ZfBugsnag', // Must be added as the first module

    // ...
];
```

### Configuration

Copy the `./vendor/itakademy/laminas-bugsnag/config/zfbugsnag.local.php.dist` file to `./config/autoload/zfbugsnag.local.php`  and customize the settings (IsEnabled/ApiKey).

