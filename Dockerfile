FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    unzip git zip curl libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install curl mbstring xml bcmath zip pcntl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . /app

CMD ["php-fpm"]
