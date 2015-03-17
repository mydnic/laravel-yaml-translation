# Add Yaml file support for Laravel 5 TranslationServiceProvider

This package uses Symfony/Yaml parser, and is forked from [Devitek/laravel-yaml-translation](https://github.com/Devitek/laravel-yaml-translation)

## Installation

### Composer

Add Laravel Localization to your `composer.json` file.

    "jackjoe/yaml-translation": "*"

Run `composer install` to get the latest version of the package.

### Manually

It's recommended that you use Composer, however you can download and install from this repository.

## Add support in Laravel

You have to replace

`'Illuminate\Translation\TranslationServiceProvider',`

with

`'JackJoe\Core\Translation\TranslationServiceProvider',`

in `config/app.php`.

## How to use

Instead of using the regular **php** files to input your translation, use **yml** or **yaml** files instead.

**PHP**:

```php
<?php

return [
	'hello' => 'Hello :name',
    'author' => 'Devitek',
];
```

Will in **YAML** be equivalent to:

```yaml
hello: Hello :name
author: Jack + Joe
```

A more complex example:

```yaml
title: My Website
copyright: |
  2015 &copy;

team:
  - name: Foo
    age: 18
  - name: Bar
    age: 20
```

## Important!

When you want to use the `yaml` files, be sure to **delete** the `php` files!

With love, by [Jack + Joe](https://jackjoe.be?utm_source=github&utm_campaign=yml)
