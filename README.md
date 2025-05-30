# Powers Signs

Powers Signs est une application web développée avec Laravel pour la gestion d'une entreprise de signalétique

## Fonctionnalités

- Système d'authentification (clients et administrateurs)
- Espace client personnalisé
- Système d'avis clients
- Dashboard administrateur
- Gestion des utilisateurs
- Gestion des messages
- Gestion des projets

## Technologies Utilisées

- Laravel 10
- PHP 8.1+
- MySQL
- Bootstrap 5
- FontAwesome

## Installation

1. Cloner le projet
```bash
git clone https://github.com/yassinmoujahid/perfectsings.git
```

2. Installer les dépendances
```bash
composer install
npm install
```

3. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données dans .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perfectsigns
DB_USERNAME=root
DB_PASSWORD=
```

5. Migrer la base de données
```bash
php artisan migrate --seed
```

6. Lancer le serveur
```bash
php artisan serve
```

## Accès Admin

Email: admin2@perfectsigns.com
Mot de passe: admin123

## Structure du Projet

- `app/` - Code source de l'application
- `config/` - Configuration de l'application
- `database/` - Migrations et seeders
- `public/` - Assets publics
- `resources/` - Vues et assets
- `routes/` - Routes de l'application
- `tests/` - Tests automatisés

## Contribution

1. Fork le projet
2. Créer une branche (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## License

[MIT](https://choosealicense.com/licenses/mit/)








