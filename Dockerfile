# Используем образ PHP с Apache
FROM php:8.0-apache

RUN docker-php-ext-install pdo pdo_mysql

# Устанавливаем директиву ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Включаем модуль mod_rewrite
RUN a2enmod rewrite

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Копируем файлы вашего приложения в директорию веб-сервера
COPY . /var/www/html/

# Обеспечиваем доступ к директориям
RUN chmod -R 755 /var/www/html/
