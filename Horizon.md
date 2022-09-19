# Laravel Horizon

### Docker file

```

FROM php:8-fpm-alpine

RUN apk update && apk add bash

RUN docker-php-ext-install pcntl
RUN docker-php-ext-install pdo_mysql

RUN apk --update add gcc make g++ zlib-dev

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
  && pecl install redis \
  && docker-php-ext-enable redis \
  && apk del pcre-dev ${PHPIZE_DEPS} \
  && rm -rf /tmp/pear

RUN apk add nano

RUN apk add openrc

# rc-service --list

```

### .env

```

QUEUE_CONNECTION=redis

REDIS_HOST=10.0.0.9
REDIS_PASSWORD=null
REDIS_PORT=6379

```

### Install Horizon

```

docker-php-ext-install pcntl

composer require laravel/horizon:^5.4

php artisan migrate # just to setup the mysql database

```

### Run Horizon
```

php artisan horizon

php artisan horizon:status # at another php docker connection

```

### Access Horizon Dashboard
```
http://localhost/horizon/dashboard
```

![TDD](/imgs/horizon.png)
![TDD](/imgs/mailtrap.png)