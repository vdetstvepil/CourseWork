# Образ
FROM php:8.1-fpm

# Зависимости
RUN apt update && \
    apt install --no-install-recommends -y \
    zlib1g-dev \
    libpng-dev \
    libzip-dev \
    unzip

# Установка дополнительных зависимостей для PHP `docker-php-ext-install`
# и языковых пакетов
RUN docker-php-ext-install  \
    zip

# Установка драйвера для PostgreSQL
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql