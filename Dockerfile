# Dockerfile
FROM php:8.2-apache

# Копіюємо код у веб-директорію
COPY . /var/www/html

# Відкриваємо порт
EXPOSE 80
