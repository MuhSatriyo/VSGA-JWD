# Project Akhir

## _This assignment is given as proof that I have completed learning as a junior web developer_

<p>project_akhir has the same features as contoh_project, but in my project_akhir I created a more attractive User Interface with a more interactive navbar</p>
<p>with a directory arrangement like this:
  
<br>project root/
<br>|-- index.php
<br>|-- daftar.php
<br>|-- style.css</p>

<p>For this directory, which contains the index.php file and supporting directories you can use dockerfile like this:</p>
<br>- # Gunakan image PHP resmi dari Docker Hub
<br> FROM php:8.1-apache

<br>- # Menyalin file proyek ke dalam direktori kerja container
<br> COPY . /var/www/html/

<br>- # Setel hak akses untuk direktori data
<br> RUN chown -R www-data:www-data /var/www/html/data

<br>- # Aktifkan mod_rewrite untuk Apache
<br> RUN a2enmod rewrite

<br>- # Restart Apache untuk menerapkan perubahan
<br> RUN service apache2 restart

<br>- # Setel working directory
<br> WORKDIR /var/www/html

<br>- # Jalankan perintah untuk memulai server
<br> CMD ["apache2-foreground"]
