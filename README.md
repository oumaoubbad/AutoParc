# 🚗 Application de Gestion de Flotte - 2ITECH

Ce projet a pour objectif de réaliser une application complète pour la **Application de Gestion de Parc Automobile**. Elle permet la gestion des voitures, des entretiens, réparations, carburants, réservations, planifications, affectations et données administratives à travers une interface sécurisée.

---

 Module Authentification

- Accès sécurisé par **login et mot de passe**
- Deux types de profils sont gérés par l’application :
  - 👤 **Administrateur**
  - 👤 **Utilisateur**
- Un administrateur principal est déjà préconfiguré pour la première connexion :
  - **Email** : `admin@admin.com`
  - **Mot de passe** : `123456789`
- Après connexion, cet administrateur peut :
  - Créer de nouveaux administrateurs
  - Créer et gérer les utilisateurs
  - Attribuer des rôles et gérer les autorisations

![Login](screenshots/login.png)

![user](screenshots/utilisateurs.png)

## 📘 Module Référentiel de Données

Gestion des entités de base utilisées dans l’application :

- Modèles de voitures
- Marques de voitures
- Types de carburants
- Types d’entretiens
- Types de réparations
- Fonctions d’employés

---

## 🚙 Modules Fonctionnels

| Module | Description |
|--------|-------------|
| **Voitures** | Gestion complète du parc automobile |
| **Traite** | Suivi administratif ou financier |
| **Carburants** | Gestion de la consommation et type de carburant |
| **Entretiens** | Planification et historique des maintenances |
| **Réparations** | Suivi des réparations réalisées |
| **Réservations** | Réservation de véhicules par les utilisateurs |
| **Affectations** | Attribution des voitures aux employés |
| **Planifications** | Organisation des déplacements ou utilisations prévues |
| **Administratifs** | Gestion des documents liés aux véhicules (assurance, carte grise, etc.) |

---

## 🛠️ Technologies utilisées

- Laravel (Back-end PHP)
- Blade (Templates HTML)
- MySQL (Base de données)
- Bootstrap (Design responsive)
- JavaScript

---

## 📸 Captures d’écran

Page de connexion :  
![Connexion](screenshots/login.png)

Tableau de bord :  
![Dashboard](screenshots/menu.png)

Gestion des voitures :  
![Voitures](screenshots/voitures.png)

la page home  
![Home](screenshots/home.png)


> 

---

## 🚀 Installation

```bash
# Cloner le projet
git clone https://github.com/oumaoubbad/AutoParc.git

# Accéder au dossier
cd AutoParc

# Installer les dépendances PHP
composer install

# Configuration de l’environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données dans le fichier .env

# Lancer les migrations
php artisan migrate

# Lancer le serveur de développement
php artisan serve
