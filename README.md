# Laravel App pour interagir avec l'API themoviedb

![App preview](https://developer.ma/images/goandev-app.png)

**Une application Laravel** pour récupérer les films tendance du jour depuis l'API Utilisant Laravel 11.x, Laravel/Jetstream, Livewire et le package PHP officiel de themoviedb. GuzzleHTTP/Guzzle.

1. https://api.themoviedb.org/3/trending/all/day?language=en-US
2. https://api.themoviedb.org/3/genre/movie/list?language=en

Voir [la documentation](https://developer.themoviedb.org/reference/trending-all)

## Live demo

https://framework.developer.ma/

-   Password :

```
12345678
```

## Important

-   Avant de lancer l’application, vérifiez que Docker Desktop est installé sur votre ordinateur.

-   Ouvrez Docker Desktop.

-   Vous devrez désactiver la vérification CORS du navigateur lors du développement en local. Je vous invite à suivre les indications via ce lien : https://alfilatov.com/posts/run-chrome-without-cors/

-   Vous devez enregistrer la clé API dans le fichier .env :

```
MOVIEDB_API_KEY=eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo

```

-   Pour optimiser l'API, j'ai créé une commande :

```
php artisan make:command FetchAndStoreFilms
```

-   Laravel 11.x a supprimé kernel.php, donc j'ai enregistré la tâche directement dans routes/console.php pour qu'elle s'exécute automatiquement une fois par jour.

## Table des matières

-   [Important](#Important)
-   [Déployer](#Déployer)
-   [Importer les films depuis API](#Importer-les-films-depuis-API)
-   [Contactez moi](#Contactez-moi)

## Déployer

1. Ouvrir le dossier de l'application dans un éditeur tel que Visual Studio.
2. Exécuter les commandes :
    - `./vendor/bin/sail build`
    - `./vendor/bin/sail up`
    - `./vendor/bin/sail artisan migrate`
3. Création d'un nouveau utilisateur :
    - Sur votre navigateur, accédez à l'adresse : [http://localhost/register](http://localhost/register)
    - Remplissez toutes les informations nécessaires.
    - Après l'inscription en tant qu'utilisateur, vous serez redirigé vers le backoffice.

### Importer les films depuis API

Pour importer les films, cliquez sur le bouton vert 'API/Mettre à jour' situé dans l'en-tête.

![Api preview](https://developer.ma/images/api-action.png)

## Contactez moi

Contactez moi sur Linkedin : [LinkedIn](https://www.linkedin.com/in/essbai/) ou par email : [salaheddine@developer.ma](mailto:salaheddine@developer.ma) ou par téléphone : [+212619888261](tel:+212619888261)
