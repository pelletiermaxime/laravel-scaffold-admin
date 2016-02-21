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
$ composer require pelletiermaxime/laravel-scaffold-admin
$ php artisan vendor:publish
```

## Usage

### Scaffold everything (migration, model, controller, routes and views)

```bash
php artisan scaffold-admin:generate  Scaffold an admin CRUD

name : Name of the model
--fields= : Comma-separated list of fields in the format COLUMN_NAME:COLUMN_TYPE.
```

Examples:

```bash
php artisan scaffold-admin:generate Posts
```

will generate the file `app/Http/Controllers/Admin/PostsController.php` with a `PostsController` class, generate a route for /admin/posts in routes.php, generate an empty model Posts, generate a migration file with the default values (an ID and the timestamp fields) and generate CRUD views.


### Scaffold a Controller

```bash
php artisan scaffold-admin:controller  Scaffold an admin controller for a model

name : Name of the associated model
--controller-name=$modelController : Controller name. Defaults to name of the model followed by Controller
--no-route : Disable the default route appended to your routes.php file.
```

Examples:

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

name : Name of the migration
--fields= : Comma-separated list of fields in the format COLUMN_NAME:COLUMN_TYPE.
```

Behind the scene this command uses the great package laracasts/generators. Have a look at [the documentation for detailed examples.][link-laracasts-generators]

Examples:

```bash
php artisan scaffold-admin:migration create_posts_table --fields="name:string"
```

### Scaffold a Model file

```bash
php artisan scaffold-admin:model       Scaffold a model class.

name : Name of the model
```

Examples:

```bash
php scaffold-admin:model Posts
```

### Scaffold a View file

```bash
php artisan scaffold-admin:view        Scaffold the views for a model

name : Name of the view
```

Examples:

```bash
php artisan scaffold-admin:view posts
```

will generate the file `resources/views/admin/posts/index.blade.php` and all the layout files for AdminLTE.

Don't forget to publish the assets (php artisan vendor:publish) to publish all the css/js necessary for AdminLTE.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Credits

- [Maxime Pelletier][link-author]

Thanks to the following packages for the inspiration :

https://github.com/laracasts/Laravel-5-Generators-Extended
https://github.com/acacha/adminlte-laravel/

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pelletiermaxime/laravel-scaffold-admin.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pelletiermaxime/laravel-scaffold-admin/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/pelletiermaxime/laravel-scaffold-admin.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/pelletiermaxime/laravel-scaffold-admin.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pelletiermaxime/laravel-scaffold-admin.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pelletiermaxime/laravel-scaffold-admin
[link-travis]: https://travis-ci.org/pelletiermaxime/laravel-scaffold-admin
[link-scrutinizer]: https://scrutinizer-ci.com/g/pelletiermaxime/laravel-scaffold-admin/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/pelletiermaxime/laravel-scaffold-admin
[link-downloads]: https://packagist.org/packages/pelletiermaxime/laravel-scaffold-admin
[link-author]: https://github.com/pelletiermaxime
[link-laracasts-generators]: https://github.com/laracasts/Laravel-5-Generators-Extended#migrations-with-schema
