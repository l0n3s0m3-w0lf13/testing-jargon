## Notes

Repository to follow the [Laracast course](https://laracasts.com/series/php-testing-jargon) by Jeffrey Way.

Version: PHPUnit 9.5

## Quick setup

Download and run:

```shell
composer update
```

## Commands

### Run all tests

```shell
vendor/bin/phpunit --colors test_folder
```

Alias:

```shell
pu test_folder
```

### Filter one test

```shell
vendor/bin/phpunit --colors test_folder --filter test_name
```
