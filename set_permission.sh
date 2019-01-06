#!/bin/sh
sudo chown -R h2z:www-data /path/to/Laravel-Isbn
sudo find /path/to/Laravel-Isbn -type d -exec chmod 750 {} \;
sudo find /path/to/Laravel-Isbn -type f -exec chmod 640 {} \;
sudo chmod -R 770 /path/to/Laravel-Isbn/storage/ /path/to/Laravel-Isbn/bootstrap/cache/
