FROM php:8.3-fpm

# Install system dependencies using Debian's apt-get
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    libzip-dev \
    libonig-dev \
    libpq-dev

# Install PHP extensions (including PostgreSQL drivers)
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# COPY ONLY composer files first
COPY composer.json composer.lock /var/www/

# Install dependencies (This layer gets cached perfectly!)
RUN composer install --no-interaction --no-plugins --no-scripts --no-dev --prefer-dist

# 3. NOW copy the rest of your application code
COPY . /var/www

# 4. Run scripts or optimization scripts after the code is copied
RUN composer dump-autoload --optimize --no-dev
# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 1. PURGE DEBIAN DEFAULTS: Completely wipe out the default site directories
RUN rm -rf /etc/nginx/sites-enabled/* /etc/nginx/sites-available/*

# 2. INJECT CONFIG: Copy your project root nginx.conf over to conf.d folder
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

# 3. LINK TO ENABLED: Symlink the new file to sites-enabled so Nginx is forced to process it
RUN ln -sf /etc/nginx/conf.d/default.conf /etc/nginx/sites-enabled/default

# 4. SUPERVISOR CONFIG: Link your process management file
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

# Start Supervisor to run both Nginx and PHP-FPM
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
