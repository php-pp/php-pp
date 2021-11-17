FROM ubuntu:20.04

COPY --from=composer:2.1.12 /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_HOME=/composer

RUN \
    apt-get update \
    # To add add-apt-repository
    && apt-get install -y software-properties-common \
    && LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php \
    && apt-get install -y \
        bash \
        shellcheck \
        php8.0-cli \
        php8.0-xml \
        # For unused-scanner \
        php8.0-mbstring \
        # For Composer
        curl zip php8.0-curl php8.0-zip \

    # Install CI tools
    && composer global require \
        steevanb/php-parallel-processes:0.2.0 \
        phpstan/phpstan:1.1.* \
        phpstan/phpstan-deprecation-rules:1.0.* \
        phpstan/phpstan-strict-rules:1.0.* \
        maglnet/composer-require-checker:3.5.* \
        wapmorgan/php-deprecation-detector:2.0.* \
        steevanb/php-code-sniffs:4.2.* \
        insolita/unused-scanner:2.3.* \
    && ln -s ${COMPOSER_HOME}/vendor/bin/composer-require-checker /usr/local/bin/composer-require-checker \
    && ln -s ${COMPOSER_HOME}/vendor/bin/phpdd /usr/local/bin/phpdd \
    && ln -s ${COMPOSER_HOME}/vendor/bin/phpcs /usr/local/bin/phpcs \
    && ln -s ${COMPOSER_HOME}/vendor/bin/phpstan /usr/local/bin/phpstan \
    && ln -s ${COMPOSER_HOME}/vendor/bin/unused_scanner /usr/local/bin/unused-scanner \

    # Purge
    && apt-get purge -y software-properties-common \
    && apt-get autoremove -y \
    && apt-get clean \
    && apt-get autoclean \
    && rm -rf /tmp/*

WORKDIR /app
