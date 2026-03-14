FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev libxml2-dev libonig-dev unzip git zip libzip-dev \
    && docker-php-ext-install curl mbstring xml bcmath pcntl zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . /app
EXPOSE 9000
CMD ["php-fpm"]
