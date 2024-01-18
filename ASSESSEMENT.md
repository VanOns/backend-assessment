
# Assessment

Om te kunnen beoordelen of jouw development skills goed aansluiten bij het Van
Ons team hebben we een kleine assessment voorbereid. Het doel is om een
typische “real world” situatie na te bootsen waarin je als het ware met een ticket
uit de backlog van project X aan de slag gaat.

## Casus

Voor een fictieve klant hebben we een app ontwikkeld die het mogelijk maakt om melkveehouders en kaas producenten te beheren. De app is gebouwd met Laravel en tailwind. De app is nog niet af en er zijn nog een aantal features die we graag willen toevoegen.

- Er moeten relaties gelegd kunnen worden tussen melkveehouders en kaas producenten. Een melkveehouder kan meerdere kaas producenten hebben en een kaas producent kan meerdere melkveehouders hebben.
- Je moet melkveehouders en kaas producenten kunnen toevoegen, bewerken en verwijderen.
- Er zijn automatsche tests die nog niet slagen, deze moeten worden gefixed.
  - Een gedeelte van de tests hebben te maken met melkveehouders en kaas producenten dit gaat meer over je kennis van Laravel. (```tests/Feature/**```)
  - De rest van de tests zijn meer algemeen en gaan over je kennis van PHP.  (```tests/Unit/**```)
- Als je klaar bent en tijd over hebt mag je zelf nog een feature toevoegen die je leuk lijkt en daar een test voor schrijven.

## Wat we van jou verwachten
Het is aan jou om (a) te bedenken wat de beste aanpak is voor het implementeren van de gevraagde features en (b) de implementatie toe te passen.

Bij de beoordeling van de opdracht letten we vooral op de kwaliteit van de (back-end) code. Specifiek kijken we of het een goede structuur heeft, netjes geschreven is en “future proof” is. Met andere woorden, is jouw code flexibel genoeg voor toekomstige doorontwikkeling?

Er staat een schatting van 8 uur voor deze opdracht. Dat is niet bindend en het is zeker niet vereist om alles af te krijgen. We zijn vooral benieuwd naar jouw stijl en hoeveel jij binnen een bepaald tijdsbestek kan neerzetten.

Omdat het om een back-end opdracht gaat is het niet belangrijk hoe de UI van de nieuwe features er uit ziet. “In het echt” zal er altijd een front-end developer bij betrokken worden. Daarom is voor deze assessment al wat basis HTML met tailwind opgezet, als je niet bekend bent met tailwind is dat geen probleem. Je mag altijd eigen css toevoegen ( ```app.css``` ) als je dat fijner vindt om mee te werken.

## Technische kanttekeningen

Om deze app te runnen heb je een aantal dingen nodig: 

- PHP 8
- Composer
- NodeJS
- NPM

Zodra je deze hebt geinstalleerd kan je de volgende commandos uitvoeren:
- ```composer install```
- ```npm install```
- ```npm run build``` of ```npm run watch``` als je wilt dat de css & js automatisch wordt gecompileerd bij wijzigingen.

PHP heeft een ingebouwde webserver die je kan starten met ```php artisan serve```. De app is dan te bereiken op ```http://localhost:8000```.

Voor deze opdracht gebruiken we een sqlite database zodat je sneller aan de slag kan. run ```touch database/database.sqlite``` om de database aan te maken. Pas in het ```.env``` file ```DB_DATABASE``` aan naar het absolute path van dat bestand. Daarna kan je ```php artisan migrate:fresh --seed``` runnen om de database te vullen met test data. Je kan zo ook de database resetten.

Er zijn automatische tests geschreven voor deze applicatie. Deze kan je runnen met ```php artisan test```. De tests zijn te vinden in ```tests/Feature``` en ```tests/Unit```. Het is niet de bedoeling dat je de tests aanpast of verwijdert.

## Wat we van je verwachten
Probeer zo veel mogelijk van features te implementeren in de tijd die je hebt. Als je niet alles af krijgt is dat geen probleem. We zijn vooral benieuwd naar jouw stijl en hoeveel jij binnen een bepaald tijdsbestek kan neerzetten.

Als je vast loopt of vragen mag je altijd advies vragen aan een van onze developers. Het is niet de bedoeling dat iemand anders code voor je schrijft maar we helpen je graag op weg. Zo gaat het ook in het echt.

Commit alle code die je schrijft in de fork van de opdarcht die je had aangemaakt op github. Zorg er voor dat je repository public is zodat wij het kunnen bekijken. Als je klaar bent stuur je een link naar de repository naar [ikwilwerken@van-ons.nl](mailto:ikwilwerken@van-ons.nl)

### Om je wat op weg te helpen als je niet super bekend bent met Laravel:
Er zijn een database migrations files aangemaakt (database/migrations/2024_01_16_165518_create_dairy_farms_table.php en database/migrations/2024_01_16_165727_create_cheese_artisans_table.php) voor het opslaan van de data. [Hier](https://laravel.com/docs/10.x/migrations#tables) kan je meer lezen over hoe je migrations kan gebruiken en toevoegen.

Er is een Cheese artisan & Dairy Farm models (app/Models/CheeseArtisan.php & app/Models/DairyFarm.php )via Models is de makkelijkste manier om te werken met de data uit de database. [Hier](https://laravel.com/docs/10.x/eloquent#retrieving-models) kan je iets meer lezen over hoe je models kan gebruiken.

Er is een Cheese artisan & Dairy Farm controller (app/Http/Controllers/CheeseArtisanController.php & app/Http/Controllers/DairyFarmController.php) via controllers kan je de data uit de database ophalen en doorgeven aan de views. [Hier](https://laravel.com/docs/10.x/controllers) kan je iets meer lezen over hoe je controllers kan gebruiken. Hier zal jij de meeste code moeten schrijven. De methodes van deze controllers worden aangeroepen door de routes (routes/web.php). [Hier](https://laravel.com/docs/10.x/routing) kan je iets meer lezen over hoe je routes kan gebruiken.

De home route returnt een template (resources/views/home.blade.php). [Hier](https://laravel.com/docs/10.x/views) kan je lezen over hoe je blade templates markup kan definieren.

---

<p align="center"><a href="https://van-ons.nl/" target="_blank"><img src="https://opensource.van-ons.nl/files/cow.png" width="50" alt="Logo of Van Ons"></a></p>
