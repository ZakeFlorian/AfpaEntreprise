<?php
require_once "../controllers/controller-signin.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<?php
include 'templates/header.php';
?>

<body class="#c62828 red darken-3 white-text">
    <h1>Connexion</h1>
    <div class="divFormSignin">
        <form id="signinForm" method="POST" action="" autocomplete="off" novalidate>

            <label for="mail" class="formSignin">
                <p class="labelUnderline">Adresse mail :</p>
                <input class="inputField" type="text" id="mail" name="mail" size="25" value="<?php if (!empty($mail)) {
                    echo $mail;
                } ?>" placeholder="mail@mon-mail.com" required>
                <span class="redInput spanEmail">
                    <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                </span>
            </label>
            <label for="password" class="formSignin">
                <p class="labelUnderline">Mot de passe :</p>
                <input class="inputField" type="password" id="password" name="password" size="20" required>
                <span class="redInput dynamicFont spanPassword">
                    <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>
                </span>
            </label>
            <input class="btn-signup" type="submit" id="btn-check" value="Se Connecter">
            <input type="hidden" id="recaptchaResponse" name="recaptcha-response">

            <span class="spanDirection"> Vous n'avez pas de compte ? <a href="controller-signup.php"> Inscrivez-vous
                    !</a></span>
            <div class="g-recaptcha captcha" data-sitekey="6LcSAXEpAAAAADRWMCz2Th4Y8QKpElr_yg1ObHkT"></div>
            <span class="error ">
                <?php if (isset($errors['g-recaptcha-response'])) {
                    echo $errors['g-recaptcha-response'];
                } ?>
            </span>
        </form>
    </div>



    <script src="https://www.google.com/recaptcha/api.js?render=6LcSAXEpAAAAADRWMCz2Th4Y8QKpElr_yg1ObHkT"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>