# Travail effectué

- 14 endpoints serveur
- Des fixtures
- Un service symfony injecté (`Services/OpenStreetMapClient`)
- Une logique métier (Scoring des lois les plus votées)
- Une documentation disponible à `/api/doc`
- Un client Web

# Comment utiliser le projet

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


```bash
php bin/console doctrine:fixtures:load
```


