<?php
    /**
     * @return PDO
     */
    function getDB(): PDO
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=oc_concevez_votre_site_web_avec_php_et_mysql;charset=utf8",
                "root", "root");
        } catch (Exception $exception) {
            die("Une erreur est survenue :" . $exception->getMessage());
        }
        return $db;
    }
