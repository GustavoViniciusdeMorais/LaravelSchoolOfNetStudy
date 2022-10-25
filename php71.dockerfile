FROM php:7.1-cli-alpine

RUN apk add php7-common \
    php7-fpm \
    php7-pdo \
    php7-opcache \
    php7-zip \
    php7-phar \
    php7-iconv \
    php7-cli \
    php7-curl \
    php7-openssl \
    php7-mbstring \
    php7-tokenizer \
    php7-fileinfo \
    php7-json \
    php7-xml \
    php7-xmlwriter \
    php7-simplexml \
    php7-dom \
    php7-pdo_mysql \
    php7-pdo_sqlite \
    php7-tokenizer \
    php7-pecl-redis \
    php7-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

WORKDIR /var/www/html/

RUN apk --update add gcc make g++ zlib-dev

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

RUN apk update && apk add bash

RUN docker-php-ext-install pcntl
# RUN docker-php-ext-install pdo_mysql

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
  && pecl install redis \
  && docker-php-ext-enable redis \
  && apk del pcre-dev ${PHPIZE_DEPS} \
  && rm -rf /tmp/pear

RUN apk add nano

ENTRYPOINT ["tail", "-f", "/dev/null"]