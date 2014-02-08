# YAML

A PHP library for parsing YAML files.

I had a probject where I needed to parse YAML.  I made this quick package using [SPYC](http://code.google.com/p/spyc/) which seems to do the trick.

## Install

Normal install via Composer.

## Usage

```php
$parsed = Travis\YAML::from_file($path)->to_array();
```