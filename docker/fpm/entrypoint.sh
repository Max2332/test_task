#!/bin/bash

if [ ! -d /var/www/html/data/logs ]; then
    gosu user mkdir -p /var/www/html/data/logs
fi

if [ ! -f /var/www/html/data/logs/nginx_access.log ]; then
    gosu user touch /var/www/html/data/logs/nginx_access.log
fi
if [ ! -f /var/www/html/data/logs/nginx_error.log ]; then
    gosu user touch /var/www/html/data/logs/nginx_error.log
fi

if [ ! -f /var/www/html/set_env.php ]; then
    gosu user cp /var/www/html/docker/fpm/set_env.php.dist /var/www/html/set_env.php
fi

gosu user composer config -g github-oauth.github.com ${GITHUB_OAUTH_TOKEN}
export PATH="$PATH:/var/www/html/vendor/bin"

exec "$@"