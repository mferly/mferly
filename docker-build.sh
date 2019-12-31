#!/bin/sh

docker build --pull --force-rm --no-cache -f ./Dockerfile-nginx -t mferly/mferly_nginx .
docker build --pull --force-rm --no-cache -f ./Dockerfile-php -t mferly/mferly_php .

docker push mferly/mferly_nginx:latest && \
docker push mferly/mferly_php:latest

# docker-compose build --no-cache --pull --force-rm --build-arg CACHE_DATE=$(date +%Y-%m-%d:%H:%M:%S)