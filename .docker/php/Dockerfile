FROM alpine:3.18.3

LABEL maintainer="Vytautas Riauka"

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC
ENV LANG C.UTF-8
ENV LC_ALL C.UTF-8

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apk add --no-cache curl zip unzip git bash wget jpegoptim optipng pngquant gifsicle lsb-release nodejs npm \
    && npm install -g pnpm svgo

# pgsql
RUN echo "http://dl-cdn.alpinelinux.org/alpine/v3.18/main" >> /etc/apk/repositories \
    && apk add --no-cache postgresql-client

RUN apk add --no-cache php82 \
    php82-common \
    php82-fpm \
    php82-pdo \
    php82-opcache \
    php82-zip \
    php82-phar \
    php82-iconv \
    php82-cli \
    php82-intl \
    php82-gd \
    php82-exif \
    php82-curl \
    php82-openssl \
    php82-mbstring \
    php82-bcmath \
    php82-tokenizer \
    php82-fileinfo \
    php82-json \
    php82-xml \
    php82-xmlwriter \
    php82-xmlreader \
    php82-simplexml \
    php82-posix \
    php82-dom \
    php82-pdo_pgsql \
    php82-tokenizer \
    php82-pcntl \
    php82-session \
    php82-ctype

RUN ln -sf /usr/bin/php82 /usr/bin/php

# composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./php.ini /etc/php82/conf.d/99-custom.ini

ARG USER_ID=1000
ENV USER_ID ${USER_ID}
ARG GROUP_ID=1001
ENV GROUP_ID ${GROUP_ID}

RUN addgroup -g $GROUP_ID --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u $USER_ID laravel
RUN chown laravel:laravel /var/www

USER laravel
