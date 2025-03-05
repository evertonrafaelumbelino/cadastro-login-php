FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 8080
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html
CMD ["apache2ctl", "-D", "FOREGROUND"]