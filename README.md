# Yaml Translation

Based and forked from https://github.com/jackjoe/laravel-yaml-translation

## Add Yaml file support for Laravel

This package uses Symfony/Yaml parser, and is forked from
[Devitek/laravel-yaml-translation](https://github.com/Devitek/laravel-yaml-translation)

## Installation

### Composer

`composer require mydnic/laravel-yaml-translation`

### Replace Service Provider

You have to replace

`Illuminate\Translation\TranslationServiceProvider::class,`

with

`Mydnic\Core\Translation\TranslationServiceProvider::class,`

in `config/app.php`.

## How to use

Instead of using the regular **php** files to input your translation, use
**yml** or **yaml** files instead.

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

## License

This is free software, and may be redistributed under the terms specified in the [LICENSE](/LICENSE) file.
