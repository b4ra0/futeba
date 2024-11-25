# Base PHP-FPM
FROM php:8.2-fpm

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && apt-get clean

# Instalar extensões PHP necessárias
RUN docker-php-ext-install pdo_pgsql pgsql

# Configurar diretório de trabalho
WORKDIR /var/www

# Copiar código do Laravel para dentro do container
COPY . /var/www

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --optimize-autoloader --no-dev

# Ajustar permissões para o Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expor a porta padrão do Laravel
EXPOSE 8000

# Script de inicialização
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
