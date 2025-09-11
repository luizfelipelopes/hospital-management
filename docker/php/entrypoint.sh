#!/bin/sh

# Exit immediately if a command exits with a non-zero status.
set -e

# Run Laravel optimizations and migrations
echo "Running Laravel setup commands..."
php artisan config:cache
php artisan route:cache
php artisan migrate --force --seed

echo "Setup complete. Starting PHP-FPM..."

# Execute the main command provided to the container.
# This will be "php-fpm" in our case.
exec "$@"