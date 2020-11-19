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

RUN apk  update && apk  upgrade

RUN apk add nginx vim openrc supervisor --no-cache

# The lack of this means that you get the error when trying to run Nginx after install
RUN mkdir -p /run/nginx

RUN mkdir -p /var/www
# Creating new user and group 'www-data' for nginx
# 82 is the standard uid/gid for "www-data" in Alpine
# -S Create a system user, -D Don't assign a password,
# -G Group
RUN set -x ; \
	addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1
RUN chown -R www-data:www-data /var/www

# PHP packages is available in the Alpine Linux repositories.
# To install php7 with modules run
RUN apk add php7-fpm php7-mcrypt php7-soap php7-openssl \
	php7-gmp php7-pdo_odbc php7-json php7-dom php7-pdo \
	php7-zip php7-mysqli php7-sqlite3 php7-apcu php7-pdo_pgsql \
	php7-bcmath php7-gd php7-odbc php7-pdo_mysql php7-pdo_sqlite \
	php7-gettext php7-xmlreader php7-xmlrpc php7-bz2 php7-iconv \
	php7-pdo_dblib php7-curl php7-ctype

# To add PHP support to Nginx we should modify Nginx configuration file
RUN rm /etc/nginx/conf.d/*
COPY nginx.conf /etc/nginx/nginx.conf

COPY wordpress.tar.gz .

RUN tar -xvzf wordpress.tar.gz -C /var/www/ && \
	rm -rf wordpress.tar.gz

# It contains your website’s base configuration details (change sample)
COPY wp-config.php /var/www/wordpress/wp-config.php

COPY php-fpm.conf /etc/php7/php-fpm.conf

COPY /supervisord.conf /etc/supervisord.conf

COPY entry.sh /tmp/
RUN chmod +x /tmp/entry.sh
EXPOSE 5050
CMD ["/tmp/entry.sh"]
