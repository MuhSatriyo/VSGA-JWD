# Project Akhir

## _This assignment is given as proof that I have completed learning as a junior web developer_

<p>project_akhir has the same features as contoh_project, but in my project_akhir I created a more attractive User Interface with a more interactive navbar</p>
<p>with a directory arrangement like this:
<br>project root/
<br>|-- index.php
<br>|-- daftar.php
<br>|-- style.css</p>

<h2>🧩 How to Deploy 👇</h2> 
<p>For this directory, which contains the index.php file and supporting directories you can use dockerfile like this:</p>

```
# Gunakan image PHP resmi dari Docker Hub
FROM php:8.1-apache
```
```
# Menyalin file proyek ke dalam direktori kerja container
COPY . /var/www/html/
```
```
<br>- # Setel hak akses untuk direktori data
<br> RUN chown -R www-data:www-data /var/www/html/data
```
```
# Aktifkan mod_rewrite untuk Apache
RUN a2enmod rewrite
```
```
# Restart Apache untuk menerapkan perubahan
RUN service apache2 restart
```
```
# Setel working directory
WORKDIR /var/www/html
```
```
# Jalankan perintah untuk memulai server
CMD ["apache2-foreground"]
```
