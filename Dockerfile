# Use PHP with FPM
FROM php:8.3-fpm

# Install system dependencies + sqlite3 CLI
RUN apt-get update && apt-get install -y \
    git curl unzip sqlite3 libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

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

# Cache Laravel config
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Expose Render's PORT
EXPOSE 10000

# Start Laravel (Render sets $PORT automatically)
CMD php artisan serve --host=0.0.0.0 --port=$PORT
