# Travail effectué

- 16 endpoints serveur
- Des fixtures
- Un service symfony injecté (`Services/OpenStreetMapClient`)
- Une logique métier (scoring des lois les plus votées)
- Une documentation disponible à `/api/doc`
- Un client Web

# Concept

Une entité _President_ possède une entité _Party_ (le parti politique du président). Chaque président a une liste de lois (entité _Law_) qui correspond aux lois qu'il fait passer. Les lois possèdent un nombre de vote. Un président possède un seul parti politique et un parti politique peut avoir plusieurs présidents de différent pays.

Un service externe qui appelle l'API OpenStreetMap permet de récupérer les coordonnées GPS du pays et ainsi d'afficher ces chères présidents sur une carte.

# Les liens utils

* [Documentation de l'API](http://politic.gweltaz-calori.com)
* [Client Web](http://www.symfony.gweltaz-calori.com)

# Comment utiliser le projet

## Installations

### Composer
```bash
# si composer installé en global
composer install
# possiblité de lancer le projet sans composer
php bin/composer.phar install
```

### VueJS
Nécessite [NodeJS](https://nodejs.org/en/).
```bash
cd client
npm i
```

### Modification du .env

Modifier le .env avec les identifiants de base de données nécéssaires

```bash
DATABASE_URL=mysql://root:@127.0.0.1:3306/symfo_politique
```

### Création de la base de données

Créer la base de données vide `symfo_politique`

### Appliquer les migrations

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### Exécution des fixtures

Afin de préremplir la base de données

```bash
php bin/console doctrine:fixtures:load
```

## Développement

```bash
# terminal 1
php bin/console run:serve
# terminal 2
cd client
npm run serve
```


