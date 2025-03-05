FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 80
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf