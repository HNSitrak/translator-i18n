<?php
require_once 'core/Database.php';

try {
    $db = Database::getConnection();
    echo "Connexion OK";
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
