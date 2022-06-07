Hallo {{$email_data['name']}}
<br>
Drücke auf den Link, um deinen Account zu bestätigen
<a href="http://127.0.0.1:8000/verify?code={{$email_data['verification_code']}}">Jetzt bestätigen und anmelden</a>
<br>
Vielen Dank!
