FROM ubuntu:22.04

# Оновлюємо пакети та встановлюємо PHP 8.2 CLI і потрібні розширення
RUN apt-get update && apt-get install -y --no-install-recommends \
    php8.2-cli \
    php8.2-curl \
    php8.2-mbstring \
    php8.2-xml \
    unzip git zip curl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . /app

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
