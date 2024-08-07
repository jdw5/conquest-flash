# Share flash messages to your frontend

[![Latest Version on Packagist](https://img.shields.io/packagist/v/conquest/flash.svg?style=flat-square)](https://packagist.org/packages/conquest/flash)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jdw5/conquest-flash/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jdw5/conquest-flash/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jdw5/conquest-flash/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jdw5/conquest-flash/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/conquest/flash.svg?style=flat-square)](https://packagist.org/packages/conquest/flash)

Flash exposes a global `flash` helper, which allows you to easily add flash messages to your session. These messages can be passed to your frontend using the `HandleInertiaRequests` middleware, see the usage section for more information.

## Installation

You can install the package via composer:

```bash
composer require conquest/flash
```

## Usage

The package ships with a global `flash` helper. Call this helper with a message to add flash messages to the session. You can configure the message, description and type. Two classes are provided which can be added separately. The `Toast` class allows for a duration to be set, a `Banner` class has no duration and will remain until dismissed. 

If not specified, the flash message is assumed to be a `Toast`.
```php
flash('Hello, World!')
flash()->toast('Hello, World!')
flash()->banner('Hello, world!')
```

To pass this to an Inertia frontend, add the following to the `HandleInertiaRequests` middleware array:
```php
'flash' => Flash::messages(),
```

It is important to use the `flash` key if you intend on using the Vue + Inertia plugin.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Joshua Wallace](https://github.com/jdw5)
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
