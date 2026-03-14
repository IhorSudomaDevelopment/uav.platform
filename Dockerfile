FROM php:8.2-cli

# Встановлюємо потрібні розширення
RUN apt-get update && apt-get install -y \
        libcurl4-openssl-dev \
        libxml2-dev \
    && docker-php-ext-install curl mbstring xml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . /app
EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
