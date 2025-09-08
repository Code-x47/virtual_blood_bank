# Use PHP with FPM
FROM php:8.3-fpm

# Install system dependencies + PostgreSQL dev libs
RUN apt-get update && apt-get install -y \
    git curl unzip libpng-dev libonig-dev libxml2-dev zip libpq-dev \
    && docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose Render's PORT
EXPOSE 10000

# Run migrations before starting Laravel
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
