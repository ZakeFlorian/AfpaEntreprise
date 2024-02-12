<?php
require_once "../controllers/controller-signin.php"
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
include 'templates/header.php';
?>

<body class="#c62828 red darken-3 white-text">
    <h1>Connexion</h1>
    <div class="divFormSignin">
        <form method="POST" action="" autocomplete="off" novalidate>

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
        </form>

        <span class="spanDirection"> Vous n'avez pas de compte ? <a href="controller-signup.php"> Inscrivez-vous !</a></span>
    </div>

    <!-- <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>