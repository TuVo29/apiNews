FROM php:8.2-cli


# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libzip-dev zip libcurl4-openssl-dev libssl-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port (Render sets this with $PORT env var)
ENV PORT=10000
EXPOSE ${PORT}

# Laravel setup
RUN php artisan config:clear
RUN php artisan route:clear

# Start Laravel server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}