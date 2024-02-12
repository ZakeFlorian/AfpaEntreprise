<?php
// Inclut le fichier controller-signup.php qui contient la logique métier pour gérer l'inscription
require_once "../controllers/controller-signup.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets//css//style.css">
    </head>

<?php
// Inclut le fichier header.php qui contient l'en-tête HTML commun à toutes les pages du site
include 'templates/header.php';
?>

<body class="#c62828 red darken-3 white-text">
    <?php if ($showform) { ?>
    <!-- Affiche le formulaire d'inscription si $showform est vrai -->
    <h1>Inscription</h1>

    <div class="divFormSignup ">
        <form method="POST" action="" enctype="multipart/form-data" autocomplete="off" novalidate>

            <!-- Champ pour le nom de l'entreprise -->
            <label class="labelSignup" for="nom">
                <p>Nom de l'entreprise<sup class="redInput">* </sup>:</p>

                <input class="inputField" type="text" id="nom" name="nom" size="20" placeholder="Gucci" value="<?php if (!empty($name)) {
                        echo $name;
                    } ?>" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ nom -->
                <span class="redInput spanNom">
                    <?= isset($errors["spanNom"]) ? $errors["spanNom"] : "" ?>
                </span>
            </label>

            <!-- Champ pour l'adresse e-mail -->
            <label class="labelSignup" for="mail">
                <p>Adresse mail de l'entreprise<sup class="redInput">* </sup> :</p>

                <input class="inputField" type="text" id="mail" name="mail" size="25" placeholder="Gucci-mail@mail.com"
                    value="<?php if (!empty($mail)) {
            echo $mail;
        } ?>" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ e-mail -->
                <span class="redInput spanEmail">
                    <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                </span>
            </label>

            <!-- Champ pour le numéro de Siret -->
            <label class="labelSignup" for="siretNumber">
                <p>Numéro de Siret<sup class="redInput">* </sup> :</p>

                <input class="inputField" type="text" name="siretNumber" value="<?php if (!empty($siret)) {
        echo $siret;
    } ?>" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ numéro de Siret -->
                <span class="redInput spanSiret">
                    <?= isset($errors["spanSiret"]) ? $errors["spanSiret"] : "" ?>
                </span>
            </label>

            <!-- Champ pour l'adresse de l'entreprise -->
            <label class="labelSignup" for="adresse">
                <p>Adresse de l'entreprise<sup class="redInput">* </sup> :</p>

                <input class="inputField" id="adresse" type="text" name="adresse" size="20" value="<?php if (!empty($adresse)) {
        echo $adresse;
    } ?>" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ adresse -->
                <span class="redInput spanAdresse">
                    <?= isset($errors["spanAdresse"]) ? $errors["spanAdresse"] : "" ?>
                </span>
            </label>

            <!-- Champ pour le code postal de l'entreprise -->
            <label class="" for="zipcode">
                <p>Code Postal de l'entreprise<sup class="redInput">* </sup> :</p>

                <input class="inputField" type="text" id="confirmPass" name="zipcode" size="20" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ code postal -->
                <span class="redInput spanZip">
                    <?= isset($errors["spanZip"]) ? $errors["spanZip"] : "" ?>
                </span>
            </label>

            <!-- Champ pour la ville de l'entreprise -->
            <label class="" for="city">
                <p>Ville de l'entreprise<sup class="redInput">* </sup> :</p>

                <input class="inputField" type="text" id="confirmPass" name="city" size="20" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ ville -->
                <span class="redInput spanCity">
                    <?= isset($errors["spanCity"]) ? $errors["spanCity"] : "" ?>
                </span>
            </label>

            <!-- Champ pour le mot de passe -->
            <label class="labelSignup" for="password">
                <p>Mot de passe<sup class="redInput">* </sup> :</p>

                <input class="inputField" type="password" id="password" name="password" size="20" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ mot de passe -->
                <span class="redInput spanPassword">
                    <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>
                </span>
            </label>

            <!-- Champ pour la confirmation du mot de passe -->
            <label class="labelSignup" for="confirmPass">
                <p>Confirmation du mot de passe<sup class="redInput">* </sup> :</p>

                <input class="inputField" type="password" id="confirmPass" name="confirmPass" size="20" required>
                <!-- Affiche un message d'erreur s'il y a une erreur associée au champ confirmation du mot de passe -->
                <span class="redInput spanConfirm">
                    <?= isset($errors["spanConfirm"]) ? $errors["spanConfirm"] : "" ?>
                </span>
            </label>


            <!-- Bouton de soumission -->
            <input class="btn-signup" type="submit" id="btn-check" value="S'enregistrer">

        </form>
        <!-- Lien vers la page de connexion -->
        <span class="spanDirectionSignup">Vous avez déjà un compte ? <a href="controller-signin.php">Connectez-vous
                !</a></span>
    </div>
    <?php } else { ?>
    <!-- Affiche un message de réussite d'inscription si $showform est faux -->
    <div id="divMessage">
        <h1>Inscription réussie</h1>
        <p> Vous pouvez à présent vous connecter.</p>
        <a href="../controllers/controller-signin.php"><button class="btn-signup">Connexion</button></a>
    </div>
    <?php } ?>
    <!-- Inclut le script JavaScript -->
    <script src="../js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>