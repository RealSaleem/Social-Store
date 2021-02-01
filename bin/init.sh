#!/bin/bash
DB_HOST=squarehouse-db
DB_NAME="squarehouse"
TEST_DB_NAME="squarehousetest"
echo "Importing DB. $DB_NAME"
echo "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;" | mysql -uroot -psquarehouse -h$DB_HOST
mysql -uroot -psquarehouse -D$DB_NAME -h$DB_HOST < ../init.sql
echo "Importing DB. $TEST_DB_NAME"
echo "DROP DATABASE IF EXISTS $TEST_DB_NAME; CREATE DATABASE $TEST_DB_NAME;" | mysql -uroot -psquarehouse -h$DB_HOST
mysql -uroot -psquarehouse -D$TEST_DB_NAME -h$DB_HOST  < ../init.sql
cp .env.example .env
npm install
composer install
php artisan key:generate
php artisan migrate --seed
