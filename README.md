Prérequis et procédure d’installation

    Prérequis techniques
        - PHP 8.2 avec extensions PDO/MySQL
        - MariaDB 10.11 ou supérieure
        - Git
        - Navigateur moderne (Chrome, Firefox, Edge)
        - jQuery (inclus via CDN dans le projet)

    Installation manuelle
        Cloner le dépôt :
            git clone  https://github.com/HNSitrak/translator-i18n.git
            cd translator-i18n


    Créer la base de données et importer le script SQL :

    mysql -u root -p
    CREATE DATABASE i18n CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    USE i18n;
    SOURCE Database/schema_i18n.sql;


    Configurer la connexion à la base
        Fichier : core/Database.php
        Modifier les paramètres

        new PDO(
            "mysql:host=localhost;dbname=i18n;charset=utf8mb4",
            "votre_nom_d_utilisateur",
            "votre_mot_de_passe",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );


    Lancer le serveur PHP intégré :

    php -S localhost:8000 -t public


    Accéder au projet dans le navigateur :

    http://localhost:8000


    Choix techniques

    Architecture simple MVC pour séparer les responsabilités :
        - Controller : récupère les données et charge la vue
        - Service : gestion des traductions et logique métier
        - Repository : accès aux données depuis la base
        - View : affichage HTML/CSS/JS
        - Traductions gérées via JSON pour les textes statiques et BDD pour les labels dynamiques
        - Extensible facilement pour ajouter de nouvelles langues
