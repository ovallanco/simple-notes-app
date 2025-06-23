# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install dependensi yang dibutuhkan untuk PHP dan MySQLi
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libonig-dev \
        libxml2-dev \
        nano \
        && docker-php-ext-install mysqli \
        && apt-get clean \
        && rm -rf /var/lib/apt/lists/*

# Salin file aplikasi ke dalam container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80
