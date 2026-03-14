# Використовуємо сучасний базовий образ Ubuntu
FROM ubuntu:22.04

# Встановлюємо необхідні пакети для PHP та PPA
RUN apt-get update && apt-get install -y \
    software-properties-common \
    curl \
    unzip \
    git \
    wget \
    lsb-release \
    ca-certificates \
    apt-transport-https \
    && add-apt-repository ppa:ondrej/php -y \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
       php8.2 \
       php8.2-cli \
       php8.2-curl \
       php8.2-mbstring \
       php8.2-xml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Встановимо робочу директорію
WORKDIR /app

# Копіюємо ваші файли в контейнер
COPY . /app

# Відкриваємо порт (змінити під ваш додаток)
EXPOSE 8080

# Команда запуску PHP сервера (змінити під ваш додаток)
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]