FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    zip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    bash

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files first to take advantage of Docker cache
COPY composer.json composer.lock ./

# Copy rest of the application (must include artisan)
COPY . .

# Now install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions (optional)
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www
