# Base image
FROM php:8.2-fpm

# Çalışma dizini oluştur
WORKDIR /var/www

# Gerekli paketleri yükle
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer yükle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel dosyalarını kopyala
COPY . /var/www

# İzinleri ayarla
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Başlatma komutu
CMD ["php-fpm"]
