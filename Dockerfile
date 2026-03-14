# Використовуємо офіційний PHP 8.2-FPM образ
FROM php:8.2-fpm

# Встановлюємо системні пакети та розширення PHP, потрібні для Laravel
RUN apt-get update && apt-get install -y \
        libcurl4-openssl-dev \
        libxml2-dev \
        libonig-dev \
        unzip \
        git \
        zip \
        curl \
        libzip-dev \
    && docker-php-ext-install curl mbstring xml bcmath pcntl zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Встановлюємо Composer (для управління залежностями Laravel)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Встановлюємо робочу директорію всередині контейнера
WORKDIR /app

# Копіюємо всі файли проєкту в контейнер
COPY . /app

# Відкриваємо порт для PHP-FPM
EXPOSE 9000

# Команда запуску PHP-FPM
CMD ["php-fpm"]
