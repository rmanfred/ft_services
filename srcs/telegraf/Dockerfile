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

RUN apk update && apk upgrade
RUN apk add openrc vim \
     telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/testing

# cpu and mem reads metrics about the system’s cpu usage and memory usage, 
# and then output this data to InfluxDB.
RUN telegraf -sample-config --input-filter cpu:mem --output-filter influxdb > telegraf.conf

COPY ./telegraf.conf /etc/telegraf/telegraf.conf

CMD ["telegraf"]
