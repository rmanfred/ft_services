# ************************************************************************** #
#                                                                            #
#                                                        :::      ::::::::   #
#   Dockerfile                                         :+:      :+:    :+:   #
#                                                    +:+ +:+         +:+     #
#   By: rmanfred <rmanfred@21-school.ru>           +#+  +:+       +#+        #
#                                                +#+#+#+#+#+   +#+           #
#   Created: 2020/08/19 10:42:02 by rmanfred          #+#    #+#             #
#   Updated: 2020/08/19 10:42:05 by rmanfred         ###   ########.fr       #
#                                                                            #
# ************************************************************************** #

FROM alpine:latest

RUN apk update; apk add \
	curl --no-cache \
	nginx openrc supervisor --no-cache

RUN adduser -D -g 'www' www
RUN mkdir /www; chown -R www:www /var/lib/nginx; chown -R www:www /www

# Normally you want to start the web server when the system is launching. 
# This is done by adding Nginx and PHP to the needed runlevel.
RUN rc-update add nginx default
RUN mkdir -p /run/openrc/

# To add PHP support to Nginx we should modify Nginx configuration file
COPY nginx.conf /etc/nginx

RUN apk add phpmyadmin php-mbstring \
	php7-fpm php7-mcrypt php7-soap php7-openssl \
	php7-gmp php7-pdo_odbc php7-json php7-dom php7-pdo \
	php7-zip php7-mysqli php7-sqlite3 php7-apcu php7-pdo_pgsql \
	php7-bcmath php7-gd php7-odbc php7-pdo_mysql php7-pdo_sqlite \
	php7-gettext php7-xmlreader php7-xmlrpc php7-bz2 php7-iconv \
	php7-pdo_dblib php7-curl php7-ctype
RUN rc-update add php-fpm7 default

RUN wget -P /www \
	https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz; \
	mkdir -p /www/phpmyadmin; \
	tar -xvzf /www/phpMyAdmin-5.0.2-all-languages.tar.gz -C /www/phpmyadmin; \
	rm -rf /www/phpMyAdmin-5.0.2-all-languages.tar.gz; \
	mv /www/phpmyadmin/phpMyAdmin-5.0.2-all-languages/* /www/phpmyadmin; \
	rm -rf /www/phpmyadmin/phpMyAdmin-5.0.2-all-languages

COPY config.inc.php /www/phpmyadmin/config.inc.php

COPY phpinfo.php /www/phpmyadmin
COPY /supervisord.conf /etc/supervisord.conf

COPY entry.sh /tmp/
RUN chmod +x /tmp/entry.sh
EXPOSE 5000
CMD ["/tmp/entry.sh"]