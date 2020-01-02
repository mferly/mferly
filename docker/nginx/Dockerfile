FROM nginx:latest

RUN apt-get update && apt-get upgrade -y \
        # ca-certificates \
        netcat-openbsd \
    && apt-get autoremove -y

COPY ./docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/conf/app.conf /etc/nginx/conf.d/app.conf

# to create local self-signed certs check out mkcert in the README.md

# COPY ./docker/nginx/certs/app-cert.pem /etc/ssl/certs/app-cert.pem
# COPY ./docker/nginx/certs/app-key.pem /etc/ssl/private/app-key.pem
# COPY ./docker/nginx/certs/dhparam.pem /etc/nginx/dhparam.pem
# COPY ./docker/nginx/conf/self-signed.conf /etc/nginx/conf.d/self-signed.conf
# COPY ./docker/nginx/conf/ssl-params.conf /etc/nginx/conf.d/ssl-params.conf

# only need the following if we're going SSL
# also uncomment the ca-certificates \ line
# in the first RUN command

# RUN update-ca-certificates