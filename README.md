# :package_name

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


## Installation

Via Composer

```bash
$ composer require :vendor/:package_name
```

## Usage

### Scaffold a Controller

```bash
php artisan scaffold-admin:controller  Scaffold an admin controller for a model

name : Name of the associated model
--controller-name=$modelController : Controller name. Defaults to name of the model followed by Controller
--no-route : Disable the default route appended to your routes.php file.
```

Exemples:

```bash
php artisan scaffold-admin:controller Posts
```

will generate the file `app/Http/Controllers/Admin/PostsController.php` with a `PostsController` class.

```bash
php artisan scaffold-admin:controller Posts --controller-name=Posts
```

will generate the file `app/Http/Controllers/Admin/Posts.php` with a `Posts` class.

### Scaffold a Migration file

```bash
php artisan scaffold-admin:migration   Scaffold a migration file.
```

### Scaffold a Model file

```bash
php artisan scaffold-admin:model       Scaffold a model class.
```

### Scaffold a View file

```bash
php artisan scaffold-admin:view        Scaffold the views for a model
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Credits

- [Maxime Pelletier][link-author]

Thanks to the following packages for the inspiration :

https://github.com/laracasts/Laravel-5-Generators-Extended
https://github.com/acacha/adminlte-laravel/

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/pelletiermaxime
