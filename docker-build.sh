#!/bin/sh

docker build --pull --force-rm --no-cache -f ./Dockerfile-nginx -t mferly/xx-array_nginx .
docker build --pull --force-rm --no-cache -f ./Dockerfile-php -t mferly/xx-array_php .

docker push mferly/xx-array_nginx:latest && \
docker push mferly/xx-array_php:latest

# docker-compose build --no-cache --pull --force-rm --build-arg CACHE_DATE=$(date +%Y-%m-%d:%H:%M:%S)