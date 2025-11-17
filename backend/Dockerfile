FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install
RUN php artisan key:generate
RUN php artisan storage:link

EXPOSE 9000
CMD ["php-fpm"]
