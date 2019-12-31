FROM nginx:latest

RUN apt-get update && apt-get upgrade -y \
        ca-certificates \
        netcat-openbsd \
    && apt-get autoremove -y

COPY ./certs/mferly-cert.pem /etc/ssl/certs/mferly-cert.pem
COPY ./certs/mferly-key.pem /etc/ssl/private/mferly-key.pem
COPY ./certs/dhparam.pem /etc/nginx/dhparam.pem
RUN update-ca-certificates

COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/mferly.conf /etc/nginx/conf.d/mferly.conf

COPY ../../ /var/www/mferly