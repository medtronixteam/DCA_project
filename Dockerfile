FROM php:8.2-fpm

# Set the working directory inside the container
WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application files to the working directory
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set the appropriate permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Start the Laravel application and run migrations
CMD php artisan migrate --seed || true && php artisan serve --host=0.0.0.0 --port=8000

