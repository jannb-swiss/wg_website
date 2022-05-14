composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan offer:sync
Compile Assets
npm run dev
# npm run watch
https://www.oulub.com/docs/laravel/de-de/migrations


