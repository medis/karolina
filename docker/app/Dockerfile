FROM php:7.2-fpm-stretch

ENV PATH="./vendor/bin:${PATH}" \
    NGINX_SERVER_NAME="_" \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="6000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="128"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        procps \
        supervisor \
        sqlite3 \
        nginx \
        git \
        libxml2-dev \
        zip unzip \
        mysql-client \
        zlib1g-dev \
        libpng-dev \
        libwebp-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-webp-dir=/usr/include/  --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install mbstring pdo pdo_mysql opcache soap zip gd \
    && pecl install apcu xdebug-2.6.0 \
    && docker-php-ext-enable apcu xdebug

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
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copy the application
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/usr/local/bin/run-app"]
