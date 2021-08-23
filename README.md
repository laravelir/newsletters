- [![Starts](https://img.shields.io/github/stars/laravelir/newsletters?style=flat&logo=github)](https://github.com/laravelir/newsletters/forks)
- [![Forks](https://img.shields.io/github/forks/laravelir/newsletters?style=flat&logo=github)](https://github.com/laravelir/newsletters/stargazers)

# Laravel newsletter subscription system

a powerfull newsletter subscription system for laravel

## Installation

1. Run the command below to install this package:

```
composer require laravelir/newsletters
```

2. Open your config/app.php and add the following to the providers array:

```php
Laravelir\Newsletters\Providers\NewslettersServiceProvider::class,
```

3. Run the command below to publish the package config file laravelir/package.php:

```
php artisan laravelir:newsletters
```
