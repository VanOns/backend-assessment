# Assessment

Om te kunnen beoordelen of jouw development skills goed aansluiten bij het Van Ons team hebben we een assessment voorbereid.
Het doel is om een typische “real world” situatie na te bootsen waarin je als het ware met een ticket uit de backlog van
project X aan de slag gaat.

## Casus

Voor een fictieve klant hebben we een app ontwikkeld die het mogelijk maakt om melkveehouders en kaasproducenten te beheren.
De app is gebouwd met Laravel en Tailwind. De app is nog niet af en er zijn nog een aantal features die we graag willen toevoegen.

- Er moeten relaties gelegd kunnen worden tussen melkveehouders en kaasproducenten. Een melkveehouder kan meerdere kaasproducenten hebben en een kaasproducent kan meerdere melkveehouders hebben.
- Je moet melkveehouders en kaasproducenten kunnen toevoegen, bewerken en verwijderen.
- Er zijn automatische tests die nog niet slagen, deze moeten werkend worden gemaakt.
  - Een gedeelte van de tests heeft te maken met melkveehouders en kaasproducenten. Dit gaat meer over je kennis van Laravel. ([tests/Feature])
  - De rest van de tests zijn meer algemeen en gaan over je kennis van PHP. ([tests/Unit])
- Als je klaar bent en tijd over hebt, mag je zelf nog een feature toevoegen die je leuk lijkt, en daar een test voor schrijven.
  - Voorbeeld: Kunnen berekenen hoeveel kaas een kaasproducent kan maken met de melk van een melkveehouder.
  - Voorbeeld: Melkveehouders een rating van een kaasproducent kunnen geven.
  - Voorbeeld: Prijzen van melkveehouders en kaasproducenten kunnen toevoegen en de winst kunnen berekenen van het verkopen van kaas na het kopen van melk.

## Wat we van jou verwachten

Het is aan jou om (a) te bedenken wat de beste aanpak is voor het implementeren van de gevraagde features en (b) de implementatie toe te passen.

Bij de beoordeling van de opdracht letten we vooral op de kwaliteit van de (back-end) code. Specifiek kijken we of het een
goede structuur heeft, netjes geschreven is en “future-proof” is. Met andere woorden, is jouw code flexibel genoeg voor toekomstige doorontwikkeling?

Omdat het om een back-end opdracht gaat is het niet belangrijk hoe de UI van de nieuwe features eruitziet. “In het echt”
zal er altijd een front-end developer bij betrokken worden. Daarom is voor deze assessment al wat basis HTML met Tailwind opgezet.
Als je niet bekend bent met Tailwind is dat geen probleem. Je mag altijd eigen css toevoegen ([app.css])
als je dat fijner vindt om mee te werken.

Probeer zo veel mogelijk features te implementeren in de tijd die je hebt. Als je niet alles af krijgt, is dat geen probleem.
We zijn vooral benieuwd naar jouw stijl en hoeveel jij binnen een bepaald tijdsbestek kunt neerzetten.

Als je vastloopt of wat wilt vragen kun je altijd bij een van onze developers terecht. Het is niet de bedoeling dat iemand
anders code voor je schrijft, maar we helpen je graag op weg. Zo gaat het in het echt ook.

Commit alle code die je schrijft in de fork van de opdracht die je hebt aangemaakt op GitHub. Zorg ervoor dat jouw repository
publiek is zodat wij het kunnen bekijken. Als je klaar bent stuur je een link van de repository naar [ikwilwerken@van-ons.nl],
samen met een screenshot waarin te zien is dat alle tests slagen.

## Technische kanttekeningen

Om deze app te runnen heb je een aantal dingen nodig: 

- PHP 8.2
- Composer
- NodeJS
- NPM

Zodra je deze hebt geïnstalleerd kun je de volgende commando's uitvoeren:
- ```composer install```
- ```npm install```
- ```npm run build``` of ```npm run watch``` als je wilt dat de CSS & JS automatisch worden gecompileerd bij wijzigingen.

PHP heeft een ingebouwde webserver die je kunt starten met ```php artisan serve```. De app is dan te bereiken op ```http://localhost:8000```.

Voor deze opdracht gebruiken we een SQLite database zodat je sneller aan de slag kunt. Hij werkt out-of-the-box,
je hoeft alleen ```php artisan migrate:fresh --seed``` te runnen om die te vullen met data. Je kunt dit ook gebruiken om de database te resetten.

Er zijn automatische tests geschreven voor deze applicatie. Deze kun je runnen met ```php artisan test```. De tests zijn
te vinden in [tests/Feature] en [tests/Unit]. Het is niet de bedoeling dat je de tests aanpast of verwijdert.

### Om je wat op weg te helpen als je niet super bekend bent met Laravel:

- Er zijn database migration files aangemaakt ([database/migrations/2024_01_16_165518_create_dairy_farms_table.php]
en [database/migrations/2024_01_16_165727_create_cheese_artisans_table.php])
voor het opslaan van de data. [Hier](https://laravel.com/docs/10.x/migrations#tables) kun je meer lezen over hoe je migrations kunt gebruiken en toevoegen.

- Er zijn `Cheese Artisan` & `Dairy Farm` models ([app/Models/CheeseArtisan.php] & [app/Models/DairyFarm.php]). Models bieden
de makkelijkste manier om te werken met de data uit de database. [Hier](https://laravel.com/docs/10.x/eloquent#retrieving-models) kun je iets meer lezen over hoe je models kunt gebruiken.

- Er zijn `Cheese Artisan` & `Dairy Farm` controllers ([app/Http/Controllers/CheeseArtisanController.php] & [app/Http/Controllers/DairyFarmController.php]).
Via controllers kun je de data uit de database ophalen en doorgeven aan de views. [Hier](https://laravel.com/docs/10.x/controllers) kun je iets meer lezen over hoe je controllers kunt gebruiken.
Hier zal jij de meeste code moeten schrijven. De methodes van deze controllers worden aangeroepen door de routes ([routes/web.php]).
[Hier](https://laravel.com/docs/10.x/routing) kun je iets meer lezen over hoe je routes kunt gebruiken.

- De home route geeft een template ([resources/views/home.blade.php]) terug. [Hier](https://laravel.com/docs/10.x/views) kun je lezen over hoe je de Blade template markup gebruikt.

---

<p align="center"><a href="https://van-ons.nl/" target="_blank"><img src="https://opensource.van-ons.nl/files/cow.png" width="50" alt="Logo of Van Ons"></a></p>

[tests/Feature]: ./tests/Feature
[tests/Unit]: ./tests/Unit
[app.css]: ./resources/css/app.css
[ikwilwerken@van-ons.nl]: mailto:ikwilwerken@van-ons.nl
[database/migrations/2024_01_16_165518_create_dairy_farms_table.php]: ./database/migrations/2024_01_16_165518_create_dairy_farms_table.php
[database/migrations/2024_01_16_165727_create_cheese_artisans_table.php]: ./database/migrations/2024_01_16_165727_create_cheese_artisans_table.php
[app/Models/CheeseArtisan.php]: ./app/Models/CheeseArtisan.php
[app/Models/DairyFarm.php]: ./app/Models/DairyFarm.php
[app/Http/Controllers/CheeseArtisanController.php]: ./app/Http/Controllers/CheeseArtisanController.php
[app/Http/Controllers/DairyFarmController.php]: ./app/Http/Controllers/DairyFarmController.php
[routes/web.php]: ./routes/web.php
[resources/views/home.blade.php]: ./resources/views/home.blade.php
