<?php
// Démarre ou reprend une session existante
session_start();

// Inclut le fichier de configuration contenant les constantes et configurations globales
require_once '../config.php';

// Inclut le modèle Entreprise pour interagir avec la base de données
require_once '../models/Entreprise.php';

// Vérifie si la requête HTTP est de type POST, c'est-à-dire si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialise un tableau pour stocker les éventuelles erreurs de validation
    $errors = [];
    // La réponse du CAPTCHA dans controller
    $captcha_response = $_POST['g-recaptcha-response'];

    // Vérifiez la réponse du CAPTCHA en utilisant l'API de Google
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcSAXEpAAAAADRWMCz2Th4Y8QKpElr_yg1ObHkT&response=" . $captcha_response);
    $response_keys = json_decode($response, true);
    if (empty($_POST['g-recaptcha-response'])) {
        $errors['g-recaptcha-response'] = "Cochez je ne suis pas un robot";
    } else if ($response_keys["success"]) {
        // Le CAPTCHA est valide. Traitez le formulaire.
    }

    // Vérifie si des erreurs ont déjà été détectées avant de procéder à d'autres vérifications
    if (empty($errors)) {
        // Début des vérifications sur les données soumises

        // Vérifie si l'e-mail soumis existe dans la base de données
        if (!Entreprise::checkMailExists($_POST['mail'])) {
            // Si l'e-mail n'existe pas, ajoute une erreur associée au champ e-mail
            $errors['spanEmail'] = 'Utilisateur Inconnu';
        } elseif (Entreprise::checkMailExists($_POST['mail']) && empty($_POST['password'])) {
            // Si l'e-mail existe mais aucun mot de passe n'a été saisi, ajoute une erreur associée au champ mot de passe
            $mail = $_POST['mail'];
            $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
        } else {
            // Si l'e-mail existe et un mot de passe a été soumis, poursuit les vérifications

            // Récupère les informations de l'utilisateur à partir de l'e-mail soumis
            $utilisateurInfos = Entreprise::getInfos($_POST['mail']);

            // Utilise la fonction password_verify pour valider le mot de passe soumis
            if (password_verify($_POST['password'], $utilisateurInfos['password_entreprise'])) {
                // Si le mot de passe est correct, enregistre les informations de l'utilisateur dans la session
                $_SESSION['user'] = $utilisateurInfos;
                // Redirige l'utilisateur vers le tableau de bord après la connexion
                header('Location: controller-dashboard.php');
                exit(); // Arrête l'exécution du script après la redirection
            } else {
                // Si le mot de passe est incorrect, ajoute une erreur associée au champ mot de passe
                $mail = $_POST['mail'];
                $errors['spanPassword'] = 'Mauvais mot de passe';
            }
        }
    }
}

// Inclut la vue view-signin.php pour afficher le formulaire de connexion
include_once '../views/view-signin.php';
