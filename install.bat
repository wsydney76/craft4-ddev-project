@echo off
composer install --no-dev &&^
php temp-init.php &&^
php craft install --interactive=0 --username=admin --password=password  --email=admin@example.com
