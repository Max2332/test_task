FROM php:7.1-fpm

# External user id
ARG uid

# Set environment variables section
ENV DEBIAN_FRONTEND noninteractive

# Install system packages
RUN apt-get update \
 && apt-get -y -qq --no-install-recommends install \
        ca-certificates \
        curl \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libpq-dev \
        libxml2-dev \
        libzip-dev \
        mc \
        ssh \
        wget

# Install php extensions
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
 && pecl install \
        redis \
        xdebug \
        zip \
 && docker-php-ext-enable \
        redis \
        xdebug \
        zip \
 && docker-php-ext-install -j$(nproc) \
        gd \
        ftp \
        iconv \
        mbstring \
        mcrypt \
        pcntl \
        pdo_pgsql \
        pgsql \
        soap \
        xmlrpc \
        bcmath \
        zip

# Set configuration for xdebug
WORKDIR "/usr/local/etc/php/conf.d/"
RUN echo "xdebug.remote_enable = 1" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_autostart = 1" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_host = `/sbin/ip route|awk '/default/ { print $3 }'`" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.idekey = PHPSTORM" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_port = 9000" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_handler = dbgp" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_mode = req" >> docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_connect_back = 1" >> docker-php-ext-xdebug.ini

ADD php.ini  /usr/local/etc/php/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR "/var/www/html"
VOLUME ["/var/www/html"]

# User permissions.
# See https://denibertovic.com/posts/handling-permissions-with-docker-volumes/
# gosu https://github.com/tianon/gosu
#
# gosu for set local user as user in container
RUN gpg --keyserver ha.pool.sks-keyservers.net --recv-keys B42F6819007F00F88E364FD4036A9C25BF357DD4
RUN curl -o /usr/local/bin/gosu -SL "https://github.com/tianon/gosu/releases/download/1.4/gosu-$(dpkg --print-architecture)" \
 && curl -o /usr/local/bin/gosu.asc -SL "https://github.com/tianon/gosu/releases/download/1.4/gosu-$(dpkg --print-architecture).asc" \
 && gpg --verify /usr/local/bin/gosu.asc \
 && rm /usr/local/bin/gosu.asc \
 && chmod +sx /usr/local/bin/gosu

# add custom entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +sx /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Create local user with UID from host machine
RUN useradd -u ${uid} -m user
USER user
RUN composer global require "fxp/composer-asset-plugin:^1.2.0"

# Add fpm pool config
ADD www.conf /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /home/user/.ssh
VOLUME "/home/user/.ssh/"

# Run composer install before container start
CMD gosu root php-fpm -D \
 && /bin/bash