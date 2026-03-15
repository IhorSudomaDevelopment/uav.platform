FROM php:8.2-apache

# системні пакети для php extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libicu-dev

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli intl zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копіюємо проект
COPY . /var/www/html

WORKDIR /var/www/html

# Встановлюємо залежності Laravel
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader

# Права
RUN chown -R www-data:www-data /var/www/html

# Apache rewrite
RUN a2enmod rewrite

# DocumentRoot -> public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# AllowOverride
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# порт для Fly
RUN sed -i 's/Listen 80/Listen 8080/g' /etc/apache2/ports.conf && \
    sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:8080>/g' /etc/apache2/sites-available/000-default.conf

EXPOSE 8080

CMD ["apache2-foreground"]
