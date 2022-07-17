<?php


    use controller\PersonnageController;

    require "constants/constants.php";

    $url = $_GET['url'] ?? "/";
    $controller = PersonnageController::getInstance();
    $controller->getRoute($url);

    include "resources/templates/index.php";
