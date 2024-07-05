# Imagen base
FROM php:8.2-apache

# Instalar dependencias
RUN apt-get update && apt-get install -y \
  curl \
  libzip-dev \
  zip \
  unzip \
  nodejs \
  npm \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip pdo_mysql

# Configurar Apache
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Configurar PHP
# COPY .docker/php.ini /usr/local/etc/php/

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar código fuente
COPY . /var/www/html

# Instalar dependencias de Composer
RUN composer install --ignore-platform-reqs --optimize-autoloader --no-dev

# Generar key de Laravel
RUN php artisan key:generate

RUN php artisan storage:link

RUN composer dump-autoload

# Permiso a carpetas de almacenamiento
RUN chown -R www-data:www-data \
  /var/www/html/storage \
  /var/www/html/bootstrap/cache

# Puerto expuesto
EXPOSE 80 443 5173

# Comando para ejecutar el servidor Apache
CMD ["apache2-foreground"]
