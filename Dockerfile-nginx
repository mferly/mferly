FROM nginx:latest

RUN apt-get update && apt-get upgrade -y \
        ca-certificates \
        netcat-openbsd \
    && apt-get autoremove -y

COPY ./docker/nginx/certs/xx-array-cert.pem /etc/ssl/certs/xx-array-cert.pem
COPY ./docker/nginx/certs/xx-array-key.pem /etc/ssl/private/xx-array-key.pem
COPY ./docker/nginx/certs/dhparam.pem /etc/nginx/dhparam.pem
COPY ./docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/conf/xx-array.conf /etc/nginx/conf.d/xx-array.conf
COPY ./docker/nginx/conf/self-signed.conf /etc/nginx/conf.d/self-signed.conf
COPY ./docker/nginx/conf/ssl-params.conf /etc/nginx/conf.d/ssl-params.conf

RUN update-ca-certificates