This package provides basic support to register and sending push message to mobile devices via FCM or APN.

## Installation

You can install the package via composer:

```bash
composer require devlabor/laravel-push
```

You can optionally publish the config file with:
```bash
php artisan vendor:publish --tag=push
```

This is the contents of the published config file:
```php
    'fcm' => [
	    'key' => env('FCM_KEY')
    ]
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email office@devlabor.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.