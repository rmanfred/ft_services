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

RUN apk  update 
RUN apk  upgrade

RUN apk add vsftpd openssl vim

RUN adduser -D -h /var/ftp rmanfred
RUN echo "rmanfred:12345" | chpasswd

RUN openssl req \
    -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/vsftpd.key -out /etc/ssl/certs/vsftpd.crt \
    -subj "/C=ru/ST=Moscow/L=Moscow/O=no/OU=no/CN=rmanfred"

RUN	mkdir -p /var/log/vsftpd
RUN touch /var/log/vsftpd/vsftpd.log
RUN touch /etc/vsftpd.user_list

COPY ./vsftpd.conf /etc/vsftpd/vsftpd.conf
COPY ./entry.sh /tmp/
RUN chmod +x /tmp/entry.sh

EXPOSE 20 21 3100
VOLUME /var/lib/ftp
CMD ["/tmp/entry.sh"]
