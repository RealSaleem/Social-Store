#!/bin/bash
DB_HOST=localhost
DB_NAME="linekw_mot_dev"
DB_USER="linekw_mot_dev"
DB_PASSOWRD="mot_dev"

echo "Importing DB. $DB_NAME"
echo "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;" | mysql -u$DB_USER -p$DB_PASSOWRD -h$DB_HOST
mysql -u$DB_USER -p$DB_PASSOWRD -D$DB_NAME -h$DB_HOST < init.sql
cp .env.staging .env

##########################
## for line-kw server only
##########################
php -d allow_url_fopen=on  -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -d allow_url_fopen=on  composer-setup.php
/usr/local/bin/ea-php73  composer.phar install

cp sub-folder-install/index.php .
cp sub-folder-install/.htaccess .

php artisan key:generate
php artisan migrate --seed

