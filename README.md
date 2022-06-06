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
<sub>
APP_NAME=WG-Website<br>
APP_ENV=local<br>
APP_KEY=generated key<br>
APP_DEBUG=true<br>
APP_URL=http://localhost
</sub> <br>

<sub>
LOG_CHANNEL=stack<br>
</sub> <br>

<sub>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=wg_website_db<br>
DB_USERNAME=your username<br>
DB_PASSWORD=your password<br>
</sub> <br>

<sub>
MAIL_MAILER=smtp<br>
MAIL_HOST=smtp.mailtrap.io<br>
MAIL_PORT=2525<br>
MAIL_USERNAME=mailtrap generated username!<br>
MAIL_PASSWORD=mailtrap generated password!<br>
MAIL_ENCRYPTION=null<br>
MAIL_FROM_ADDRESS=hello@example.com<br>
MAIL_FROM_NAME=WG-Website<br>
</sub><br>

<sub>
CACHE_DRIVER=file<br>
QUEUE_CONNECTION=sync<br>
SESSION_DRIVER=file<br>
SESSION_LIFETIME=120<br>
</sub>

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




