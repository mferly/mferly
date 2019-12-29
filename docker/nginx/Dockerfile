FROM nginx:latest

RUN apt-get update && apt-get upgrade -y \
        ca-certificates \
        netcat-openbsd \
    && apt-get autoremove -y

COPY ./certs/xx-array-cert.pem /etc/ssl/certs/xx-array-cert.pem
COPY ./certs/xx-array-key.pem /etc/ssl/private/xx-array-key.pem
COPY ./certs/dhparam.pem /etc/nginx/dhparam.pem
RUN update-ca-certificates

COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/xx-array.conf /etc/nginx/conf.d/xx-array.conf

COPY ../../ /var/www/xx-array