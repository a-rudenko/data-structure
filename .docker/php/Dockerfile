FROM php:8.0.9-fpm-alpine

COPY ./.docker/php/configs/php.ini /usr/local/etc/php
RUN apk --update upgrade \
    && apk add --update --no-cache autoconf automake make g++ \
    && pecl install xdebug-3.0.0 \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/cache/apk/*
