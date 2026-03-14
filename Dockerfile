FROM php:8.2-cli

# Встановлюємо потрібні розширення
RUN apt-get update && apt-get install -y \
        libcurl4-openssl-dev \
        libxml2-dev \
        unzip \
        git \
    && docker-php-ext-install curl mbstring xml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Робоча директорія
WORKDIR /app

# Копіюємо файли проєкту
COPY . /app

# Відкриваємо порт для PHP сервера
EXPOSE 8080

# Команда запуску сервера
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
