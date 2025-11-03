# Filament components and related classes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/noot-pro/filament-base.svg?style=flat-square)](https://packagist.org/packages/noot-pro/filament-base)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/noot-pro/filament-base/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/noot-pro/filament-base/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/noot-pro/filament-base/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/noot-pro/filament-base/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/noot-pro/filament-base.svg?style=flat-square)](https://packagist.org/packages/noot-pro/filament-base)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require noot-pro/filament-base
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-base-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-base-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-base-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentBase = new NootPro\FilamentBase();
echo $filamentBase->echoPhrase('Hello, NootPro!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ayman Alhattami](https://github.com/Noot-Pro)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
