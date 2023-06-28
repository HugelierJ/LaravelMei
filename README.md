## Installation Laravel Project

Make sure composer and node.js are installed on your machine.

1) sla het .env.example op als .env (dit vind je terug in de root)
2) open het .env bestand
3) vul hier uw database gegevens in
4) verander filesystem_disk=local naar filesystem_disk=public
5) ga nu naar de site van mailtrap en kopieër je Mailing configuratie en plak deze in het .env bestand (dit gaat van MAIL_MAILER tot MAIL_ENCRYPTION)
6) vul nu alle velden in het .env bestand in aan de hand van je eigen STRIPE account
7) je STRIPE CLI vindt je hier moest je deze niet vinden. https://dashboard.stripe.com/test/webhooks/create?endpoint_location=local
8) hierna gebruik je het commando : npm install , hierop volgt : composer install
9) nu gebruik je het volgende commando: php artisan key:generate
10) verwijder nu eerst de assets map onder de public folder
11) kijk nu bij storage/app/ of er hier een public directory is, als er geen aanwezig maak hier manueel een public directory aan
12) gebruik het volgende commando: php artisan storage:link
13) hierna gebruik je php artisan migrate:fresh --seed
14) het admin account is : hugelierjason@gmail.com met wachtwooord: 12345678
15) hierna is het project klaar om te testen dit doe je als volgt: npm run dev, en: php artisan serve
