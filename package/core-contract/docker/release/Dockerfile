FROM php:8.0.12-cli-alpine3.14

COPY --from=composer:2.1.12 /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_HOME=/composer

RUN \
    apk add --no-cache \
        bash \
        cloc \
        jq \
        git \

    # Purge
    && rm -rf /tmp/*

WORKDIR /app
