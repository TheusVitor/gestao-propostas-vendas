FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip

# pega o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia TODO o código **antes** de instalar dependências
COPY . .

# Agora o arquivo artisan existe, o package:discover vai funcionar
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=8000
