#!/bin/sh
chown -R vsftp:vsftp /var/lib/ftp
vsftpd /etc/vsftpd/vsftpd.conf