#!/bin/sh
openrc default
/etc/init.d/mariadb setup
rc-service mariadb start

mysql -u root mysql < init.sql
mysql -u root wordpress < wordpress.sql
rc-service mariadb stop
/usr/bin/mysqld --user=mysql