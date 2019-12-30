#!/bin/sh

docker build --pull --force-rm --no-cache -f ./Dockerfile-nginx -t xx-array_nginx .
docker build --pull --force-rm --no-cache -f ./Dockerfile-php -t xx-array_php .

# docker push mferly/xx-nginx:2
# docker push mferly/xx-php:2
# docker push mferly/xx-app:2

# docker-compose build --no-cache --pull --force-rm --build-arg CACHE_DATE=$(date +%Y-%m-%d:%H:%M:%S)