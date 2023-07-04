FROM php:8.2.6-alpine

COPY ./.docker/php/configs/php.ini /usr/local/etc/php
RUN apk --update upgrade \
    && apk add --update --no-cache autoconf automake make g++ linux-headers \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/cache/apk/*
