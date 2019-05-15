# Simple way to add comments to your Laravel Eloquent models

[![Latest Version on Packagist](https://img.shields.io/packagist/v/axitdev/laravelfastcomments.svg?style=flat-square)](https://packagist.org/packages/axitdev/laravelfastcomments)
[![Build Status](https://img.shields.io/travis/axitdev/laravelfastcomments/master.svg?style=flat-square)](https://travis-ci.org/axitdev/laravelfastcomments)
[![Quality Score](https://img.shields.io/scrutinizer/g/axitdev/laravelfastcomments.svg?style=flat-square)](https://scrutinizer-ci.com/g/axitdev/laravelfastcomments)
[![Total Downloads](https://img.shields.io/packagist/dt/axitdev/laravelfastcomments.svg?style=flat-square)](https://packagist.org/packages/axitdev/laravelfastcomments)

## Installation

You can install the package via composer:

```bash
composer require axitdev/laravelfastcomments
```

Publish the migration:
``` bash
php artisan vendor:publish --provider="Axitdev\LaravelFastComments\LaravelFastCommentsServiceProvider"
```

And don't forget to migrate:
```bash
php artisan migrate
```

## Usage

Just add `HasComments` trait to the eloquent model.
``` php
...
class Post extends Model
{
    use HasComments;
    ...
}
```

### Creating Comments

To create new comment you can use `comment` method.
``` php
$post = Post::find(1);

$post->comment('Comment text');
```
By default `comment` method will create a comment with `user_id` from `auth()->user()->id`, but you can create comment as another user.
``` php
$user = User::find(1);
$post = Post::find(1);

$post->comment('Comment text', $user);
```

### Retrieving Comments
To get list of comments you can use `comments` method.
``` php
$post = Post::find(1);

$post->comments;
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email axitdev@gmail.com instead of using the issue tracker.

## Credits

- [Oleksii Ivanov](https://github.com/axitdev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.