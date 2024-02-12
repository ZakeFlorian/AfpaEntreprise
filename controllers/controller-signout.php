<?php
// Inclusion du fichier de configuration
require_once '../config.php';

// Inclusion de la classe Enterprise si nécessaire
require_once __DIR__ . '/../models/Entreprise.php';

// Démarrage de la session
session_start();

// Suppression de toutes les variables de session
$_SESSION = array();

// Destruction de la session
session_destroy();

// Redirection vers la page de connexion
header("Location: controller-signin.php");
// Arrêt de l'exécution du script
exit();

