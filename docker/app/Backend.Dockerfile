FROM php:7.3-fpm-alpine

RUN apk add --update --no-cache \
    postgresql-dev && \
    docker-php-ext-install \
    pdo \
    pdo_pgsql


WORKDIR /app
