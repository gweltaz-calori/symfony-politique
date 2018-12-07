# Travail effectué

- 14 endpoints serveur
- Des fixtures
- Un service symfony injecté (`Services/OpenStreetMapClient`)
- Une logique métier (Scoring des lois les plus votées)
- Une documentation disponible à `/api/doc`
- Un client Web

# Concept

Une entité "President", une entité "Party" (le partie politique du President), une entity "Law" (les lois qu'il fait passer), les loi possède à nombre de vote comme ca on pourra afficher les lois les plus votés.

Un President peux faire voter plusieurs lois, chaque loi s'applique dans le pays du President, on peut voter pour chacune des lois, visualiser les meilleurs lois, ainsi que les meilleurs loi par pays. Un président peut proposer une nouvelle loi. Un président possède un seul parti politique et un parti politique peut être posséder par plusieurs président de différent pays.

Un service externe qui appelle l'api OpenStreetMap permettant de récupérer les coordonnées gps du pays et ainsi d'afficher nos chers président sur une carte sur une carte (coté client).

# Ou accéder

Il est possible d'accéder à la doc de l'api à cette adresse [http://politic.gweltaz-calori.com](http://politic.gweltaz-calori.com)


Il est possible d'accéder au client à cette adresse [http://www.symfony.gweltaz-calori.com](http://www.symfony.gweltaz-calori.com)

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

## Modification du .env

Modifier le .env avec les identifiants de base de données nécéssaires

```bash
DATABASE_URL=mysql://root:@127.0.0.1:3306/symfo_politique
```

## Création de la base de données

Créer la base de données vide `symfo_politique`

## Appliquer les migrations

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

## Exécution des fixtures

Afin de préremplir la base de données

```bash
php bin/console doctrine:fixtures:load
```


