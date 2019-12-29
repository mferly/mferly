#!/bin/sh

docker build --pull --force-rm --no-cache -f ./docker/nginx/Dockerfile -t xx-nginx ./docker/nginx
docker build --pull --force-rm --no-cache -f ./docker/php/Dockerfile -t xx-php ./docker/php
docker build --pull --force-rm --no-cache -f ./Dockerfile -t xx-app .

# docker push mferly/xx-nginx:2
# docker push mferly/xx-php:2
# docker push mferly/xx-app:2

# docker-compose build --no-cache --pull --force-rm --build-arg CACHE_DATE=$(date +%Y-%m-%d:%H:%M:%S)