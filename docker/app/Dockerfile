FROM php:8.2-fpm-alpine

ENV PATH="./vendor/bin:${PATH}" \
    NGINX_SERVER_NAME="_" \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="6000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="128"

RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        bash \
#        build-base \
        linux-headers \
        libpng-dev \
    #    libonig-dev \
        libxml2-dev \
        libzip-dev \
        libpq-dev \
        zip \
        unzip \
        git \
        oniguruma-dev \
        curl \
        sqlite \
        supervisor \
        nginx

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug \
    && apk del -f .build-deps
    #        procps \
    #        supervisor \
    #        sqlite3 \
    #        nginx \
    #        git \
    #        libxml2-dev \
    #        zip unzip \
    #        mysql-client \
    #        zlib1g-dev \
    #        libpng-dev \
    #        libwebp-dev \
    #        libfreetype6-dev \
    #        libjpeg62-turbo-dev \
    #         \
#    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-webp-dir=/usr/include/  --with-jpeg-dir=/usr/include/ \
RUN docker-php-ext-configure gd \
    && docker-php-ext-install mbstring pdo_pgsql opcache zip gd exif pcntl bcmath

COPY php/php-fpm.d/docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY php/conf.d/*.ini /usr/local/etc/php/conf.d/
COPY php/php.ini /usr/local/etc/php/php.ini

COPY nginx/h5bp /etc/nginx/h5bp

COPY supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY supervisor/conf.d/*.conf /etc/supervisor/conf.d-available/

COPY run-app.sh /usr/local/bin/run-app
COPY php/composer-installer.sh /usr/local/bin/composer-installer

ADD https://github.com/kelseyhightower/confd/releases/download/v0.16.0/confd-0.16.0-linux-amd64 /usr/local/bin/confd
COPY confd/conf.d/ /etc/confd/conf.d/
COPY confd/templates/ /etc/confd/templates/

RUN chmod +x /usr/local/bin/confd \
    && chmod +x /usr/local/bin/run-app \
    && chmod +x /usr/local/bin/composer-installer \
    && /usr/local/bin/composer-installer \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copy the application
COPY . /var/www/html

RUN mkdir /etc/supervisor/conf.d

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/usr/local/bin/run-app"]
