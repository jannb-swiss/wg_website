<h1>Getting started</h1>

<h4>Benötigte Accounts<br></h4>
https://mailtrap.io/?gclid=CjwKCAjwy_aUBhACEiwA2IHHQKyhvsArb9FvHUD59EEjGmzCS-dN7ftCpvhK8mEmwD3aFpLN5fQpUxoCVrMQAvD_BwE

<h4>Repository Klonen</h4> 
* git clone git@github.com:jannb-swiss/wg_website.git

<h4>Wechsle zum Repository Verzeichnis</h4>

* composer install <br>
* npm install <br>
* cp .env.example .env <br>
* php artisan key:generate

  
<h4>Wechsle zum generierten .env File</h4>
```ruby
APP_NAME=WG-Website
APP_ENV=local
APP_KEY=generated key
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wg_website_db
DB_USERNAME=your username
DB_PASSWORD=your password

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=mailtrap generated username!
MAIL_PASSWORD=mailtrap generated password!
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME=WG-Website

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

<h4>Datenbank</h4>
Erstelle in deiner MySQL-Datenbak die Datenbank "wg_website_db"<br>
Wechsle zum Repository Verzeichnis
* php artisan migrate <br>

<h4></h4>
* npm run dev<br>

<h4>Scheduler starten</h4>
* php artisan schedule:work

<h4>Lokaler Server starten</h4>
* php artisan serve


<h2>Testing</h2>
<h4>Wechsle auf den branche "Testing"</h4>

<h4>Scheduler für den Putzplan testen</h4>
* trigger: php artisan schedule:run<br>
* auto: php artisan schedule:work<br>
