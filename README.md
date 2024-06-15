# B2C Shop
Author: Pavlo Maksymov

Based on Laravel

## Installation

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

## Usage

```shell
./vendor/bin/sail up
```
