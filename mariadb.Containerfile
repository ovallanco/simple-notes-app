# Gunakan image dasar MariaDB
FROM mariadb:10.11

# Salin file SQL untuk inisialisasi database ke folder Docker yang dikenali
COPY init.sql /docker-entrypoint-initdb.d/

# Set environment variable jika diperlukan (opsional, atau bisa saat run)
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=mydb