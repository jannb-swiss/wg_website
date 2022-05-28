composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan offer:sync
Compile Assets
npm run dev
trigger: php artisan schedule:run
auto: php artisan schedule:work


# npm run watch
https://www.oulub.com/docs/laravel/de-de/migrations
https://getstream.io/blog/invite-only-chat-laravel-vue/
https://pusher.com/tutorials/how-to-build-a-chat-app-with-vue-js-and-laravel/
https://getstream.io/blog/invite-only-chat-laravel-vue/#inviting-users
