<?php

    namespace controller;

    use impl\PersonnageServiceImpl;
    use mapper\PersonnageMapper;
    use model\Personnage;

    class PersonnageController
    {
        private static ?PersonnageController $instance = null;

        public static function getInstance(): PersonnageController
        {
            if (is_null(self::$instance))
                self::$instance = new PersonnageController();
            return self::$instance;
        }

        public function getRoute($url)
        {
            $service = PersonnageServiceImpl::getInstance();
            $mapper = PersonnageMapper::getInstance();
            session_start();
            /* @var $sessionPerso Personnage */
            switch ($url) {
                case "play":
                    if (!empty($_POST["utiliser"])) {
                        $_SESSION["perso"] = $service->findByName($mapper->mapPostToPersonnageDto($_POST)) ?? null;
                    } else {
                        $service->savePersonnage($mapper->mapPostToPersonnageDto($_POST));
                    }
                    header("location:" . WEBROOT . "index.php");
                    break;
                case "fight":
                    $service->hitSomeone($_SESSION["perso"], $service->findByName($mapper->mapPostToPersonnageDto($_GET)));
                    header("location:" . WEBROOT . "index.php");
                    break;
                default:
                    require "resources/templates/index.php";
                    break;
            }
            die();
        }

    }
