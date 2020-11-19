CREATE DATABASE wordpress; 
CREATE USER 'rmanfred'@'%' identified by 'admin';
GRANT ALL PRIVILEGES ON wordpress.* TO 'rmanfred'@'%' IDENTIFIED BY 'admin';
FLUSH PRIVILEGES;