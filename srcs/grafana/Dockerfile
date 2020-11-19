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
	grafana --repository http://dl-3.alpinelinux.org/alpine/edge/testing

COPY datasources.yaml /usr/share/grafana/conf/provisioning/datasources/influxdb.yaml
COPY dashboards.yaml /usr/share/grafana/conf/provisioning/dashboards/influxdb.yaml
COPY grafana.ini /usr/share/grafana/conf/custom.ini

COPY dashboards/* /var/lib/grafana/dashboards/

COPY entry.sh /tmp/
RUN chmod +x /tmp/entry.sh

EXPOSE 3000
CMD ["/tmp/entry.sh"]
