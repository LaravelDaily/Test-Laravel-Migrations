FROM php:8-fpm-alpine

WORKDIR /var/www

RUN apk --update add wget \
  curl \
  build-base \
  libmemcached-dev \
  libmcrypt-dev \
  pcre-dev \
  zlib-dev \ 
  autoconf \
  cyrus-sasl-dev \
  libgsasl-dev \
  oniguruma-dev \
  openssl \
  openssl-dev \
  mysql-dev \
  redis 

RUN docker-php-ext-install pdo_mysql pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm /var/cache/apk/*