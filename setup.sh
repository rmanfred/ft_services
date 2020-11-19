#!/bin/sh

minikube stop
minikube delete
minikube start --driver=virtualbox 
minikube addons enable metallb
eval $(minikube docker-env)

kubectl apply -f ./srcs/metallb/configmetalb.yaml

docker build -t nginx_image ./srcs/nginx
kubectl apply -f ./srcs/nginx/nginx.yaml

docker build -t mysql_image ./srcs/mysql
kubectl apply -f ./srcs/mysql/mysql.yaml

docker build -t wordpress_image ./srcs/wordpress
kubectl apply -f ./srcs/wordpress/wordpress-deployment.yaml

docker build -t phpmyadmin_image ./srcs/php
kubectl apply -f ./srcs/php/php.yaml

docker build -t ftps_image ./srcs/ftps
kubectl apply -f ./srcs/ftps/ftps.yaml

docker build -t influxdb_image ./srcs/influxdb
kubectl apply -f ./srcs/influxdb/influx-config.yaml
kubectl apply -f ./srcs/influxdb/influxdb.yaml

docker build -t grafana_image ./srcs/grafana
kubectl apply -f ./srcs/grafana/grafana.yaml

docker build -t telegraf_image ./srcs/telegraf
kubectl apply -f ./srcs/telegraf/telegraf.yaml

# # ssh rmanfred@192.168.99.131 -p22
# # password: qwerty

# kubectl exec deploy/ftps-deployment -- pkill vsftpd
# kubectl exec deploy/influxdb-deployment -- pkill influxdb
# kubectl exec deploy/wordpress-deployment -- pkill nginx
# kubectl exec deploy/phpmyadmin-deployment -- pkill php-fpm7
# kubectl exec deploy/phpmyadmin-deployment -- pkill nginx
# kubectl exec deploy/mysql-deployment -- pkill /usr/bin/mysqld
# kubectl exec deploy/wordpress-deployment -- pkill php-fpm7
# kubectl exec deploy/nginx-deployment -- pkill /usr/sbin/sshd
# kubectl exec deploy/nginx-deployment -- pkill nginx

# rm /Library/VirtualBox/HostInterfaceNetworking-vboxnet0-Dhcpd.leases