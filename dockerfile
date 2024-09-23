# Use an official PHP image with the necessary extensions
FROM php:8.1-fpm

# Set the working directory for your project "mister_quiz"
WORKDIR /var/www/mister_quiz

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files to container
COPY . .


# Install Composer dependencies


RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/mister_quiz/storage /var/www/mister_quiz/bootstrap/cache


# Expose the PHP-FPM port
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
