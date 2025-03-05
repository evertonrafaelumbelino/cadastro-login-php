FROM php:8.2-apache

# Copiar os arquivos do projeto para a pasta padrão do Apache
COPY . /var/www/html/

# Expor a porta correta do Railway
EXPOSE 8080

# Definir o ServerName para evitar avisos
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Modificar o Apache para rodar na porta 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf
RUN sed -i 's/:80>/:8080>/' /etc/apache2/sites-enabled/000-default.conf

# Ajustar permissões dos arquivos e diretórios para evitar erros de acesso
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Adicionar permissão correta ao Apache
RUN echo "<Directory /var/www/html>
    Require all granted
</Directory>" >> /etc/apache2/apache2.conf

# Comando para iniciar o Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]