CREATE DATABASE wordpress; 
CREATE USER 'user'@'%' identified by 'passw';
GRANT ALL PRIVILEGES ON wordpress.* TO 'user'@'%' IDENTIFIED BY 'passw';
FLUSH PRIVILEGES;