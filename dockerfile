# Use uma imagem PHP com Apache
FROM php:8.1-apache

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar os arquivos do projeto para dentro do container
COPY . /var/www/html/

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Instalar as dependências do PHP (via Composer)
RUN composer install

# Ajustar permissões do diretório para o Apache
RUN chown -R www-data:www-data /var/www/html

# Expor a porta 80
EXPOSE 80

# Definir o comando padrão para rodar o Apache em primeiro plano
CMD ["apache2-foreground"]
