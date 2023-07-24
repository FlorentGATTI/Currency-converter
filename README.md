# Projet Conversion Monétaire

Ce projet est une application de conversion monétaire développée avec Laravel (back-end) et Vue.js (front-end). L'application permet de convertir des devises et de gérer les paires de conversion via une API REST et une interface d'administration.

## Configuration

### Back-end (Laravel)

1. Assurez-vous d'avoir PHP et Composer installés sur votre système.
2. Clonez ce dépôt : `git clone https://github.com/FlorentGATTI/Currency-converter`.
3. Accédez au dossier backend : `cd currency_back`.
4. Installez les dépendances : `composer install`.
5. Créez une copie du fichier `.env.example` et renommez-la en `.env`.
6. Générez une clé d'application : `php artisan key:generate`.
7. Configurez les informations de la base de données dans le fichier `.env`.
8. Exécutez les migrations pour créer les tables de la base de données : `php artisan migrate`.
9. (Optionnel) Exécutez les seeders pour pré-remplir la base de données : `php artisan db:seed`.
10. Lancez le serveur de développement : `php artisan serve`.

Le back-end sera accessible à l'adresse `http://localhost:8000`.

### Front-end (Vue.js)

1. Assurez-vous d'avoir Node.js et npm installés sur votre système.
2. Accédez au dossier frontend : `cd currency_app`.
3. Installez les dépendances : `npm install`.
4. Copiez le fichier `.env.example` et renommez-le en `.env`.
5. Configurez l'URL de l'API back-end dans le fichier `.env`.
6. Compilez les ressources front-end : `npm run dev` (pour le développement) ou `npm run build` (pour la production).

Le front-end sera accessible à l'adresse `http://localhost:5173`.
Pour se connecter nous avons besoin de l'adresse e-mail : "admin@admin.com" et du mot de passe : "admin".
(N'oublier pas de bien exécuter les seeders !)

## Structure du Projet

- `currency_back` : Contient le code du back-end Laravel.
- `currency_front` : Contient le code du front-end Vue.js.
- `currency_back/app` : Les contrôleurs, les modèles et les autres fichiers Laravel.
- `currency_back/config` : Les fichiers de configuration du back-end.
- `currency_back/database` : Les migrations et les seeders.
- `currency_front/src` : Le code source Vue.js.
- `currency_front/public` : Les fichiers publics du front-end.
- ...

## Auteurs

- Florent GATTI DM-22_École Multimedia

## Licence

Ce projet est sous licence MIT. 