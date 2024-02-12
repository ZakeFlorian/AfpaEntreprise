<?php

session_start();
// empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if(!isset($_SESSION['user'])){
    header('Location: controller-signin.php');
    exit();
}
// $idEntreprise = $_SESSION['user']['ID_Entreprise'];
// l'ordre est important car Entreprise.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Entreprise.php';

// Récupère le pseudo de l'user'
$nom = isset($_SESSION['user']['name_entreprise']) ? $_SESSION['user']['name_entreprise'] : "Nom d'entreprise non défini";
$siret = isset($_SESSION['user']['siretnumber_entreprise']) ? ($_SESSION['user']['siretnumber_entreprise']) : "Siret non défini";
$email = isset($_SESSION['user']['email_entreprise']) ? ($_SESSION['user']['email_entreprise']) : "Email non défini";
$adresse = isset($_SESSION['user']['adresse_entreprise']) ? ($_SESSION['user']['adresse_entreprise']) : "Adresse non définie";
$code_postal = isset($_SESSION['user']['zipcode_entreprise']) ? ($_SESSION['user']['zipcode_entreprise']) : "Code postal non défini";
$ville = isset($_SESSION['user']['city_entreprise']) ? ($_SESSION['user']['city_entreprise']) : "Ville non définie";
// Vérifie si une photo d'user est définie dans la session
if (isset($_SESSION['user']['Image_entreprise']) && !empty($_SESSION['user']['Image_entreprise'])) {
    // Utilise la photo de l'user s'il en existe une
    $img = $_SESSION['user']['Image_entreprise'];
} else {
    // Utilise une photo par défaut si aucune photo d'entreprise n'est définie
    $img = "../assets/img/joyboy.jpg";
}
// Supprimer le profil entreprise
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_profile'])) {
    // Appelle la méthode pour supprimer le profil
    $delete_result = Entreprise::deleteEntreprise($idEntreprise);

    if ($delete_result === true) {
        // Suppression réussie, redirigez vers la page d'accueil avec un message de succès
        header("Location: ../index.php?message=Redirection+reussie");
        exit();
    } else {
        echo "Erreur lors de la suppression du profil : " . $delete_result;
        exit();
    }
}
$allUtilisateurs = Entreprise::getAllUsers($_SESSION['user']['ID_Entreprise']);
$actifUtilisateurs = Entreprise::getActifUtilisateurs($_SESSION['user']['ID_Entreprise']);
$allTrajets = Entreprise::getAllTrajets($_SESSION['user']['ID_Entreprise']);
$lastfiveusers = Entreprise::getLastFiveUsers($_SESSION['user']['ID_Entreprise']);
$lastfivetrajet = Entreprise::getLastFiveTrajet($_SESSION['user']['ID_Entreprise']);
include_once '../views/view-dashboard.php';