#!/bin/bash

php-fpm &


exec /usr/bin/supervisord -n


exec /usr/bin/supervisord
