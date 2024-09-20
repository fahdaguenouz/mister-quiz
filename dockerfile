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
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql gd bcmath

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files to container (assuming your app files are in the current directory)
COPY . .

# Set folder permissions for Laravel directories (adjust if needed)
RUN chown -R www-data:www-data /var/www/mister_quiz/storage /var/www/mister_quiz/bootstrap/cache

# Install Composer dependencies (for production, no dev dependencies)
RUN composer install --no-dev --optimize-autoloader

# Expose the PHP-FPM port (9000 is the default)
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
