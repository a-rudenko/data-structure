FROM php:8.1.11-fpm-alpine

COPY ./.docker/php/configs/php.ini /usr/local/etc/php
RUN apk --update upgrade \
    && apk add --update --no-cache autoconf automake make g++ \
    && pecl install xdebug-3.1.6 \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/cache/apk/*
