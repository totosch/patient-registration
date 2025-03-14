FROM php:8.2-cli

# Instala dependencias del sistema y extensiones PHP requeridas
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Instala extensiones PHP necesarias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copia Composer desde la imagen oficial de composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define el directorio de trabajo
WORKDIR /var/www

# Copia todo el código de la aplicación al contenedor
COPY . .

# Copia el archivo de entorno y ejecuta composer install
RUN cp .env.example .env && composer install


# Expone el puerto en el que se ejecutará la app (8000)
EXPOSE 8000

# Comando para iniciar el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]