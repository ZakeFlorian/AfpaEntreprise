<?php
// L'ordre est important car Entreprise.php utilise des constantes venant de config.php 

// Inclut le fichier de configuration contenant les constantes et configurations globales
require_once '../config.php';

// Inclut le modèle Entreprise pour interagir avec la base de données
require_once '../models/Entreprise.php';

// Variable pour contrôler l'affichage du formulaire
$showform = true;

// Initialise un tableau pour stocker les éventuelles erreurs de validation
$errors = [];

// Vérifie si la requête HTTP est de type POST, c'est-à-dire si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérifications des champs soumis et ajout des erreurs au tableau $errors le cas échéant

    // Vérifie si le champ nom est vide
    if (empty($_POST['nom'])) {
        $errors['spanNom'] = 'Veuillez saisir votre nom';
    }

    // Vérifie si le champ mail est vide
    if (empty($_POST['mail'])) {
        $errors['spanEmail'] = 'Veuillez saisir un mail valide';
    } elseif(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
        $errors['spanEmail'] = 'Veuillez saisir un mail valide';
    }

    // Vérifie si le champ siretNumber est vide et s'il a une longueur valide
    if (empty($_POST['siretNumber'])) {
        $errors['spanSiret'] = 'Veuillez saisir votre Numéro Siret';
    } elseif(strlen($_POST['siretNumber']) != 14){
        $errors['spanSiret'] = 'Veuillez saisir un Numéro Siret valide';
    }

    // Vérifie si le champ adresse est vide
    if (empty($_POST['adresse'])) {
        $errors['spanAdresse'] = "Veuillez saisir l'adresse de votre entreprise";
    }

    // Vérifie si le champ zipcode est vide
    if (empty($_POST['zipcode'])) {
        $errors['spanZip'] = "Veuillez saisir le code postal de l'entreprise";
    } 

    // Vérifie si le champ city est vide
    if (empty($_POST['city'])) {
        $errors['spanCity'] = "Veuillez saisir la ville de l'entreprise";
    } 

    // Vérifie si le champ password est vide
    if (empty($_POST['password'])) {
        $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
    }

    // Vérifie si le champ confirmPass est vide
    if (empty($_POST['confirmPass'])) {
        $errors['spanConfirm'] = 'Votre mot de passe doit être similaire';
    }

    // Si aucune erreur, traiter les données et soumettre le formulaire
    if (empty($errors)) {
        // Récupération des données soumises pour création d'une entreprise

        $name = $_POST['nom'];
        $mail = $_POST['mail'];
        $siret = $_POST['siretNumber'];
        $adresse = $_POST['adresse'];
        $zipcode = $_POST['zipcode'];
        $city = $_POST['city'];
        $password = $_POST['password'];

        // Appel à la méthode create du modèle Entreprise pour créer une nouvelle entreprise dans la base de données
        Entreprise::create($name, $mail, $siret, $adresse, $zipcode, $city, $password);

        // Sert à masquer la div formulaire si la création est réussie
        $showform = false;
    }
}

// Inclut la vue view-signup.php pour afficher le formulaire d'inscription
include_once '../views/view-signup.php';
