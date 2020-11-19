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
RUN apk add influxdb vim openrc

VOLUME /var/lib/influxdb

COPY entry.sh /tmp/
RUN chmod +x /tmp/entry.sh
EXPOSE 8086
CMD ["/tmp/entry.sh"]