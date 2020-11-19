openssl req \
    -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout nginx-selfsigned.key -out nginx-selfsigned.crt \
    -subj "/C=ru/ST=Moscow/L=Moscow/O=no/OU=no/CN=localhost"