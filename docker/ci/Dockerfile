FROM ubuntu:20.04

COPY --from=composer:2.1.12 /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_HOME=/composer

ARG USER_APP_ID=1000
ARG GROUP_APP_ID=1000
ARG GROUP_DOCKER_ID=999

RUN \
    apt-get update \
    && apt-get upgrade -y \

    # Create user app and add him in group docker
    && addgroup --gid ${GROUP_DOCKER_ID} docker \
    && addgroup --gid ${GROUP_APP_ID} app \
    && adduser --uid ${USER_APP_ID} --gid ${GROUP_APP_ID} app \
    && adduser app docker \

    # To add add-apt-repository
    && apt-get install -y software-properties-common \
    && LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php \

    # Install PHP and Composer dependencies
    && apt-get install -y \
        curl \
        zip \
        php8.0-cli \
        php8.0-curl \
        php8.0-zip \

    # Install PHP dependencies
    && php8.0 /usr/local/bin/composer global require \
        steevanb/php-parallel-processes:0.2.* \
        symfony/console:5.3.* \
        symfony/finder:5.3.* \

    # Purge
    && apt-get purge -y software-properties-common \
    && apt-get autoremove -y \
    && apt-get clean \
    && apt-get autoclean \
    && rm -rf /tmp/*

USER app
