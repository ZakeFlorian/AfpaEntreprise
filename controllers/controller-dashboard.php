<?php
// empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
session_start();

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

// Récupère le pseudo de l'entreprise'
$nom = isset($_SESSION['entreprise']['name_entreprise']) ? $_SESSION['entreprise']['name_entreprise'] : "Nom d'entreprise non défini";
$siret = isset($_SESSION['entreprise']['siretnumber_entreprise']) ? ($_SESSION['entreprise']['siretnumber_entreprise']) : "Siret non défini";
$email = isset($_SESSION['entreprise']['email_entreprise']) ? ($_SESSION['entreprise']['email_entreprise']) : "Email non défini";
$adresse = isset($_SESSION['entreprise']['adresse_entreprise']) ? ($_SESSION['entreprise']['adresse_entreprise']) : "Adresse non définie";
$code_postal = isset($_SESSION['entreprise']['zipcode_entreprise']) ? ($_SESSION['entreprise']['zipcode_entreprise']) : "Code postal non défini";
$ville = isset($_SESSION['entreprise']['city_entreprise']) ? ($_SESSION['entreprise']['city_entreprise']) : "Ville non définie";
// Vérifie si une photo d'entreprise est définie dans la session
if (isset($_SESSION['entreprise']['Image_entreprise']) && !empty($_SESSION['entreprise']['Image_entreprise'])) {
    // Utilise la photo de l'entreprise s'il en existe une
    $img = $_SESSION['entreprise']['Image_entreprise'];
} else {
    // Utilise une photo par défaut si aucune photo d'entreprise n'est définie
    $img = "../assets/img/joyboy.jpg";
}
// Supprimer le profil entreprise
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_profile'])) {
    // Appelle la méthode pour supprimer le profil
    $delete_result = Entreprise::deleteEnterprise($idEntreprise);

    if ($delete_result === true) {
        // Suppression réussie, redirigez vers la page d'accueil avec un message de succès
        header("Location: ../index.php?message=Redirection+reussie");
        exit();
    } else {
        echo "Erreur lors de la suppression du profil : " . $delete_result;
        exit();
    }
}
$allUtilisateurs = Entreprise::getAllUsers($_SESSION['entreprise']['ID_Entreprise']);
$actifUtilisateurs = Entreprise::getActifUtilisateurs($_SESSION['entreprise']['ID_Entreprise']);
$allTrajets = Entreprise::getAllTrajets($_SESSION['entreprise']['ID_Entreprise']);
$lastfiveusers = Entreprise::getlastfiveusers($_SESSION['entreprise']['ID_Entreprise']);
$lastfivejourneys = Entreprise::getlastfivejourneys($_SESSION['entreprise']['ID_Entreprise']);
include_once '../views/view-dashboard.php';