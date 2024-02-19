<?php
session_start();

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: controller-signin.php');
    exit();
}

// Inclut le fichier de configuration contenant les constantes et configurations globales
require_once '../config.php';
// Inclut le modèle Entreprise pour interagir avec la base de données
require_once '../models/Entreprise.php';

// Récupère les données de l'utilisateur depuis la session
$userData = $_SESSION['user'];

// Assurez-vous que toutes les clés nécessaires existent dans $userData pour éviter les erreurs
$nom = $userData['name_entreprise'] ?? "Nom d'entreprise non défini";
$siret = $userData['siretnumber_entreprise'] ?? "Siret non défini";
$email = $userData['email_entreprise'] ?? "Email non défini";
$adresse = $userData['adresse_entreprise'] ?? "Adresse non définie";
$code_postal = $userData['zipcode_entreprise'] ?? "Code postal non défini";
$ville = $userData['city_entreprise'] ?? "Ville non définie";
$img = $userData['Image_entreprise'] ?? "../assets/img/joyboy.jpg";

// Supprimer le profil de l'entreprise
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_profile'])) {
    $delete_result = Entreprise::deleteEntreprise($userData['ID_Entreprise']);

    if ($delete_result === true) {
        // Suppression réussie, redirigez vers la page d'accueil avec un message de succès
        header("Location: ../index.php?message=Profil+supprimé+avec+succès");
        exit();
    } else {
        echo "Erreur lors de la suppression du profil : " . $delete_result;
        exit();
    }
}

// Récupère les données nécessaires depuis la base de données
$idEntreprise = $userData['ID_Entreprise'];
$allUtilisateurs = json_decode(Entreprise::getAllUsers($idEntreprise), true)['total_users'] ?? 0;
$lastFiveTrajet = json_decode(Entreprise::getLastFiveTrajet($idEntreprise), true);
$actifUtilisateurs = json_decode(Entreprise::getActifUtilisateurs($idEntreprise), true);
$allTrajets = json_decode(Entreprise::getAllTrajets($idEntreprise), true);
$lastFiveUsers = json_decode(Entreprise::getLastFiveUsers($idEntreprise), true);
$statsTransports = json_decode(Entreprise::getTransportStats($idEntreprise), true);

// Inclut la vue view-dashboard.php pour afficher le tableau de bord
include_once '../views/view-dashboard.php';
