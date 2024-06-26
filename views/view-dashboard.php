<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <title>Dashboard - Entreprise</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
</head>

<body class="#eceff1 blue-grey lighten-5">
<header>
    <nav class="cyan lighten-5 black-text">
        <div class="nav-wrapper">
            <a href="../controllers/controller-signout.php" class="right buttonHome2 hoverable black-text">Déconnexion</a>
        </div>
    </nav>
</header>


    <div class="containerr col l4">
        <ul class="LeftDiv #1e88e5 blue darken-1">

            <div class="profile-image-container">
                <img src="<?= $img ?>" alt="photo de profil" class="profile-image">
                <form method="post" action="../controllers/controller-dashboard.php" enctype="multipart/form-data"
                      class="file-input-container">
                    <input type="file" name="profile_image" id="profile_image"
                           accept="image/png, image/gif, image/jpeg, image/jpg" required>
                    <input type="submit" value="Télécharger">
                </form>
            </div>
            <div class="profile-info ">
                <p class=""><span
                            class="spanCSS"> Nom:</span> <?= $nom ?></p>
                <p class=""><span
                            class="spanCSS">Siret: </span> <?= $siret ?></p>
                <p class=""><span
                            class="spanCSS">Email: </span> <?= $email ?></p>
                <p class=""><span
                            class="spanCSS">Adresse: </span> <?= $adresse ?></p>
                <p class=""><span
                            class="spanCSS">Code postal: </span> <?= $code_postal ?></p>
                <p class=""><span
                            class="spanCSS">Ville: </span> <?= $ville ?></p>
            </div>

            <!-- <div class="container5">
                <button class="hoverable" id="editDescriptionBtn">Modifier le profil</button>
                <form action="../controllers/controller-dashboard.php" method="post" class="deleteProfil">
                    <input type="hidden" name="delete_profile" value="<?= $delete_result ?>">
                    <button class="delete_profile hoverable" type="submit" name="delete_profile"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce profil ?')">Supprimer le profil
                    </button>
                </form>
            </div> -->

        <!-- Formulaire de modification du profil (masqué par défaut) -->
        <form method="post" action="/controllers/controller-dashboard.php" class="transparent-form"
              enctype="multipart/form-data" id="editDescriptionForm" style="display: none;">
            <div class="profile-info">
                <p><span class="styleProfil"> Nom:</span></p>
                <input type="text" name="enterprise_name" placeholder="Nouveau nom" value="<?= $nom ?>">
                <!-- Affichage des erreurs pour le nom -->
                <?php if (isset($errors['enterprise_name'])) { ?>
                    <span class="error-message"><?= $errors['name']; ?></span>
                <?php } ?>
                <p><span class="styleProfil">Email:</span></p>
                <input type="text" name="mail" placeholder="Nouveau email" value="<?= $email ?>">
                <!-- Affichage des erreurs pour l'email -->
                <?php if (isset($errors['mail'])) { ?>
                    <span class="error-message"><?= $errors['mail']; ?></span>
                <?php } ?>
                <p><span class="styleProfil"> Adresse:</span></p>
                <input type="text" name="adress" placeholder="Nouveau nom" value="<?= $adresse ?>">
                <!-- Affichage des erreurs pour l'adresse -->
                <?php if (isset($errors['adress'])) { ?>
                    <span class="error-message"><?= $errors['adress']; ?></span>
                <?php } ?>
                <p><span class="styleProfil"> Code postal:</span></p>
                <input type="text" name="zipcode" placeholder="Nouveau nom" value="<?= $code_postal ?>">
                <!-- Affichage des erreurs pour le code postal -->
                <?php if (isset($errors['zipcode'])) { ?>
                    <span class="error-message"><?= $errors['zipcode']; ?></span>
                <?php } ?>
                <p><span class="styleProfil"> Ville:</span></p>
                <input type="text" name="city" placeholder="Nouveau nom" value="<?= $ville ?>">
                <!-- Affichage des erreurs pour le code postal -->
                <?php if (isset($errors['city'])) { ?>
                    <span class="error-message"><?= $errors['city']; ?></span>
                <?php } ?>
                <div class="profile-info">
                    <input type="submit" name="save_modification" value="Enregistrer" class="file-input-button">
                    <button type="button" id="cancelEditBtn" class="file-input-button">Annuler<br></button>
                </div>
            </div>
        </form>
        </ul>
            <div class="MiddleDiv">
                <div class="masonry row">
                    <div class="col s12 push-s2">
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <div class="card">
                                <div class="titre card-content black-text">
                                    <span class="card-title center-align">Total des utilisateurs :</span>
                                    <p class="black-text compteur"><?= $allUtilisateurs ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="card">
                                <div class="titre card-content black-text">
                                    <span class="card-title center-align">Utilisateurs actifs :</span>
                                    <p class="black-text compteur"><?= $actifUtilisateurs ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="card">
                                <div class="card-content black-text">
                                    <span class="titre card-title center-align">Total des trajets :</span>
                                    <p class="black-text compteur"><?= $allTrajets ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="card">
                                <div class="card-content black-text">
                                    <span class="titre card-title center-align">Stats hebdomadaire globales</span>
                                    <p class="black-text compteur">(à venir)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="card">
                                <div class="card-content black-text">
                                    <span class="titre card-title center-align">Stats des Moyens de transport</span>
                                    <canvas id="doughnutChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content black-text">
                                    <span class="titre card-title center-align">5 derniers trajets</span>
                                    <div class="card-metric">
                                        <div class="table-container">
                                            <table class="highlight responsive-table">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Pseudo</th>
                                                    <th>Transport</th>
                                                    <th>Kilomètres</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($lastFiveTrajet as $trajet) : ?>
                                                    <tr>
                                                        <td><?= $trajet['date_trajet'] ?></td>
                                                        <td><?= $trajet['nickname_utilisateur'] ?></td>
                                                        <td><?= $trajet['Type_modedetransport'] ?></td>
                                                        <td><?= $trajet['distance_trajet'] ?> kms</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content black-text">
                                <span class="titre card-title center-align">Liste des utilisateurs</span>
                                <div class="card-metric">
                                        <div class="table-container">
                                            <table class="highlight responsive-table">
                                                <thead>
                                                <tr>
                                                    <th>Pseudo</th>
                                                    <th>Switch</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($getEveryone as $everyone) : ?>
                                                    <tr>
                                                        <td><?= $everyone['nickname_utilisateur'] ?></td>
                                                        <td><div class="switch">
    <label>
      Off
      <input type="checkbox" data-user-id="<?= $everyone['id_utilisateur'] ?>" id="toggleCheckbox" <?= $everyone['user_validate'] == 1 ? "checked" : "" ?>>
      <span class="lever"></span>
      On
    </label>
  </div></td>
                                                    </tr>
                                                <?php endforeach;
                                                 ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="RightDiv">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content black-text">
                            <span class="titre card-title center-align">5 derniers utilisateurs</span>
                                <div class="card-metric">
                                <?php foreach ($lastFiveUsers as $user) : ?>
                                    <div class="user-profile">
                                        <img src="/<?= $user['Image_utilisateur'] ?>"
                                             alt="User Photo">
                                        <p><?= $user['nickname_utilisateur'] ?></p>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbarToggle = document.getElementById("navbar-toggle");
        const navbarNav = document.getElementById("navbar-nav");
        if (navbarToggle && navbarNav) {
            navbarToggle.addEventListener("click", function () {
                navbarNav.classList.toggle("active");
            });
        }
        document.getElementById('editDescriptionBtn').addEventListener('click', function () {
            // Masquer la div avec la classe profile-info
            document.querySelector('.profile-info').style.display = 'none';
            // Afficher le formulaire de modification
            document.getElementById('editDescriptionForm').style.display = 'block';
        });
        // Afficher le formulaire de modification si des erreurs sont présentes
        if (<?= !empty($errors) ? 'true' : 'false' ?>) {
            document.getElementById('editDescriptionForm').style.display = 'block';
            document.querySelector('.profile-info').style.display = 'none';
        }
        document.getElementById('cancelEditBtn').addEventListener('click', function () {
            // Afficher à nouveau la div avec la classe profile-info
            document.querySelector('.profile-info').style.display = 'block';
            // Masquer le formulaire de modification
            document.getElementById('editDescriptionForm').style.display = 'none';
        });
    });
// Récupérer les données PHP des stats transports dans une variable JavaScript
var statsTransports = <?php echo json_encode($statsTransports); ?>;

// Initialiser les tableaux pour les données et les couleurs
var data = [];
var labels = [];
var backgroundColors = [];
var borderColors = [];
// Générer des couleurs aléatoires
function generateRandomColor() {
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    return 'rgba(' + r + ',' + g + ',' + b + ')';
}
// Itérer à travers les données de transport
statsTransports.forEach(function(stat) {
    labels.push(stat.Type_modedetransport); // Modification ici pour utiliser la bonne clé
    data.push(stat.stats);
    var randomColor = generateRandomColor();
    backgroundColors.push(randomColor);
    borderColors.push(randomColor.replace('0.2', '1'));
});

// Générer le graphique Doughnut
var ctx = document.getElementById('doughnutChart').getContext('2d');
var doughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            label: 'Nombre de trajets',
            data: data,
            backgroundColor: backgroundColors,
            borderColor: borderColors,
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: {
                display: true,
                labels: {
                    generateLabels: function(chart) {
                        var data = chart.data;
                        if (data.labels.length && data.datasets.length) {
                            return data.labels.map(function(label, i) {
                                var ds = data.datasets[0];
                                return {
                                    text: label + ': ' + ds.data[i], // Ajouter le nom de transport et la valeur
                                    fillStyle: ds.backgroundColor[i],
                                    hidden: isNaN(ds.data[i]),
                                    lineCap: 'round',
                                    fontColor: '#080808'
                                };
                            });
                        }
                        return [];
                    }
                }
            }
        }
    }
});

document.addEventListener('click', e=> {
    if(e.target.type=='checkbox'){
        if(e.target.checked == false) {
            console.log('unvalidate')
            fetch(`controller-ajax.php?unvalidate=${e.target.dataset.userId}`)
        }else {
            console.log('validate')
            fetch(`controller-ajax.php?validate=${e.target.dataset.userId}`)
        }
        
    }
})
</script>
</body>

</html>