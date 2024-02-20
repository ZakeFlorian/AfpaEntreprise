<?php
require_once('../config.php');
require_once('../models/Entreprise.php');
if(isset($_GET['validate'])) {
    Entreprise::validate($_GET['validate']);
    header('Location: controller-dashboard.php');
}
if(isset($_GET['unvalidate'])) {
    Entreprise::unvalidate($_GET['unvalidate']);
    header('Location: controller-dashboard.php');
}