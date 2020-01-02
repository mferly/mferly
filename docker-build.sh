#!/bin/sh

docker build --pull --force-rm --no-cache -f ./docker/nginx/Dockerfile -t $1_nginx:latest .
docker build --pull --force-rm --no-cache -f ./Dockerfile -t $1_php:latest .

# docker push mferly/mferly_nginx:latest && \
# docker push mferly/mferly_php:latest

# docker-compose build --no-cache --pull --force-rm --build-arg CACHE_DATE=$(date +%Y-%m-%d:%H:%M:%S)