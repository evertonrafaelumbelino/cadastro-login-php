FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 8080
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
CMD ["apache2ctl", "-D", "FOREGROUND"]