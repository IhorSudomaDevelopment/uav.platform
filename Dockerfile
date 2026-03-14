# Dockerfile
FROM php:8.2-apache

# Копіюємо твій код у веб-директорію
COPY . /var/www/html

# Відкриваємо порт для Fly.io
EXPOSE 8080

# Команда, яку запускає контейнер
CMD ["apache2-foreground"]
