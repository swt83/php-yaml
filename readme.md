# YAML

A PHP library for parsing YAML files.

## Install

Normal install via Composer.

## Usage

```php
$parsed = Travis\YAML::from_file($path)->to_array();
$parsed = Travis\YAML::from_string($string)->to_array();
```