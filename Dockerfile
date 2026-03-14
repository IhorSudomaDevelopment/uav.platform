# ── Базовий образ з PHP 8.2 FPM
FROM php:8.2-fpm

# ── Встановлюємо системні пакети та PHP-розширення
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install \
        bcmath \
        mbstring \
        curl \
        xml \
        zip \
        pcntl \
        intl \
        gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ── Встановлюємо Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ── Робоча директорія всередині контейнера
WORKDIR /app

# ── Копіюємо весь проєкт у контейнер
COPY . /app

# ── Встановлюємо залежності Laravel через Composer
RUN composer install --no-dev --optimize-autoloader

# ── Права на storage і bootstrap/cache
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# ── Виставляємо користувача
USER www-data

# ── Порт для Fly.io (вбудований PHP сервер на 8000)
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
