FROM php:7.2-cli

LABEL maintainer = "Hadi Tajallaei"

RUN echo "Update and install required apt packages"
RUN apt-get update -y && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    gcc-6-base \
    libc6 \
    libgcc1 \
    libbz2-dev \
    && docker-php-ext-install zip

RUN echo "Installing Xdebug"
RUN pecl update-channels \
    && pecl install xdebug-2.7.0beta1
COPY php/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "Installing Composer"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version

RUN echo "Setting up Mounting Volume"
RUN mkdir -p /var/usr/src

VOLUME /var/usr/src

ENV CODECOV_TOKEN="b64d234f-795d-4752-b8d7-341954670f78"

WORKDIR /var/usr/src