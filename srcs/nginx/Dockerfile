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

RUN apk update; apk upgrade; apk add \
	curl --no-cache \
	vim --no-cache \
	openssh --no-cache \
	nginx openrc supervisor --no-cache 

RUN	set -x ; \
	addgroup -g 82 -S www-data ; \
	adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

# Creating new user and group 'www' for nginx
RUN adduser -D -g 'www' www

# Create a directory for html files
RUN mkdir -p /www
RUN chown -R www:www /var/lib/nginx
RUN chown -R www:www /www

# The lack of this means that you get the error when trying to run Nginx after install
RUN mkdir -p /run/nginx

RUN rc-update add nginx default

RUN chown -R www-data:www-data /var/www

COPY nginx_localhost ./etc/nginx/conf.d/default.conf
COPY /supervisord.conf /etc/supervisord.conf

COPY nginx-selfsigned.key /etc/ssl/private/nginx-selfsigned.key
COPY nginx-selfsigned.crt /etc/ssl/certs/nginx-selfsigned.crt
COPY index.html /var/www

COPY start.sh /tmp/
RUN chmod +x /tmp/start.sh

RUN echo -e "qwerty\nqwerty" | adduser rmanfred

EXPOSE 80 443 22
CMD ["/tmp/start.sh"]
