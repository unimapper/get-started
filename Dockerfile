FROM php:5.6-apache

RUN apt-get update && apt-get -yq install git libssl-dev libcurl4-openssl-dev php-pear
RUN docker-php-ext-install mysqli curl
RUN pecl install mongo
RUN echo 'extension=mongo.so' > /etc/php5/mods-available/mongo.ini
RUN docker-php-ext-enable mongo curl mysqli
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin

ADD ./app /var/www/html
WORKDIR /var/www/html
RUN composer update