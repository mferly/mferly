#!/bin/sh

Fail() {
  echo "ERROR: $@" 1>&2
  exit 1
}

which realpath >/dev/null || Fail "realpath not found"
which php      >/dev/null || Fail "php not found"
which composer >/dev/null || Fail "composer not found"
which yarn     >/dev/null || Fail "yarn not found"

cd "$(realpath "$(dirname "$0")"/..)"

composer update --prefer-dist --no-interaction
composer dump-autoload --optimize --no-dev --classmap-authoritative

php bin/console cache:clear --no-warmup --env=prod
php bin/console cache:warmup --env=prod

yarn
yarn encore production