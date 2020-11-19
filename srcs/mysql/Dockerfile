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

RUN apk add mysql mysql-client openrc

RUN mkdir -p /run/mysqld ;\
    chown -R mysql /run/mysqld

# The main config file for the server engine for Versions of Alpine	since 3.9
COPY my.cnf /etc/my.cnf

# Set up the user
COPY init.sql ./

# to add it first create account on phpmyadmin and then export your base
# COPY wordpress.sql ./

# Port 3306 is the default port for the classic MySQL protocol (port), 
# which is used by the mysql client.
EXPOSE 3306

COPY entry.sh /tmp/
RUN chmod +x /tmp/entry.sh
CMD ["/tmp/entry.sh"]