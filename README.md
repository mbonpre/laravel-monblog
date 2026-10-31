# Web_Blog — TP Laravel

Application de blog web développée avec Laravel dans le cadre du TP
de Génie Logiciel 2e année.

**Étudiant :** Précieux Namboni  
**Enseignant :** Dr. ZOHOU Pierre Jérôme  

---

## Fonctionnalités

- Inscription et connexion des utilisateurs (Laravel Breeze)
- Création, modification et suppression d'articles
- Classement des articles par catégories
- Filtrage des articles par catégorie avec pagination
- Système de commentaires (ajout et suppression)
- Gestion du profil utilisateur
- Page d'accueil publique style Magazine

---

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- XAMPP (Apache + MySQL)
- Node.js + npm

---

## Installation

### 1. Dézipper le projet
Placer le dossier dans `C:\xampp\htdocs\`

### 2. Installer les dépendances PHP
```
composer install
```

### 3. Configurer l'environnement
Copier le fichier `.env.example` et le renommer en `.env`
```
copy .env.example .env
```
Puis ouvrir `.env` et renseigner le nom de votre base de données.

### 4. Générer la clé de l'application
```
php artisan key:generate
```

### 5. Créer la base de données
Ouvrir phpMyAdmin et créer une base de données nommée `blog_laravel`

### 6. Exécuter les migrations
```
php artisan migrate
```

### 7. Installer les dépendances JavaScript
```
npm install && npm run build
```

### 8. Lancer le serveur
```
php artisan serve
```

L'application sera accessible sur : http://localhost:8000

---

## Compte de test

Après les migrations, créer un compte via la page d'inscription :
http://localhost:8000/register

---

## Structure de la base de données

| Table | Description |
|---|---|
| users | Comptes utilisateurs |
| categories | Catégories des articles |
| articles | Articles du blog |
| commentaires | Commentaires sur les articles |

---

## Technologies utilisées

- Laravel 10
- Laravel Breeze (authentification)
- MySQL
- Tailwind CSS
- Blade (moteur de templates)
```

---

## Fichier 2 — .env.example

Crée un fichier `.env.example` à la racine du projet avec ce contenu :
```
APP_NAME=WebBlog
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Maintenant — Comment zipper proprement

Une fois ces deux fichiers créés, ouvre CMD et tape :
```
cd C:\xampp\htdocs\Projets\Web_Blog