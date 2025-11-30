![header](./.github/resources/pxlrbt-image-compare.png)


# Filament Favicon

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pxlrbt/filament-image-compare.svg?include_prereleases)](https://packagist.org/packages/pxlrbt/filament-image-compare)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/pxlrbt/filament-image-compare/code-style.yml?branch=main&label=Code%20style&style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/pxlrbt/filament-image-compare.svg)](https://packagist.org/packages/pxlrbt/filament-image-compare)

Image Comparison / Two-Up Entry for Before/After Comparison. 

![Preview](./.github/resources/preview.gif)

## Installation via Composer

```bash
composer require pxlrbt/filament-image-compare
```

## Usage

```php
ImageCompareEntry::make()
    ->leftImage(fn ($record) => $record->left_image)
    ->rightImage(fn ($record) => $record->right_image)
```

## Contributing

If you want to contribute to this packages, you may want to test it in a real Filament project:

- Fork this repository to your GitHub account.
- Create a Filament app locally.
- Clone your fork in your Filament app's root directory.
- In the `/filament-image-compare` directory, create a branch for your fix, e.g. `fix/error-message`.

Install the packages in your app's `composer.json`:

```json
"require": {
    "pxlrbt/filament-image-compare": "dev-fix/error-message as main-dev",
},
"repositories": [
    {
        "type": "path",
        "url": "filament-image-compare"
    }
]
```

Now, run `composer update`.

## Credits
- [Dennis Koch](https://github.com/pxlrbt)
- [All Contributors](../../contributors)
