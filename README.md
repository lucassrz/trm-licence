# Projet TRM Licence

Projet de gestion des ressources au sein d'un établissement scolaire.

Pour installer le projet, vous devez avoir en prérequis:
- Node
- Composer
- PHP CLI >=8

Cloner le projet:
```bash
git clone https://github.com/lucassrz/trm-licence.git
```

Installer les dépendances PHP:
```bash
composer install
```

Installer les dépendances JS:
```bash
npm ci
```

Copier le .env.example et renommez le en .env
Modifier les valeurs pour que le site puisse ce connecter

Ensuite éxécuter les migrations pour récupérer la structure de la base de données:
```bash
php artisan migrate
```

Pour créer l'interface du site (visuel):
```bash
npm run build
```

Lancer le serveur web:
```bash
php artisan serve
```
