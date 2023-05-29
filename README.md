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
```
.env.example -> .env
```
Modifier les valeurs pour que le site puisse ce connecter à votre base de données

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

Rendez-vous sur l'URL suivante : './register' pour créer votre compte utilisateur.

Pour créer un enseignant, il faut d'abord créer les statuts puis les disciplines.

Pour créer un groupe, il faut d'abord créer les matières et les enseignants.
