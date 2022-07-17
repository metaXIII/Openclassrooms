<?php

    class Database
    {
        private $database = "oc_concevez_votre_site_web_avec_php_et_mysql";
        private $charset = "utf8";
        private $host = "localhost";
        private $username = "root";
        private $password = "root";

        public function getPdo()
        {
            try {
                return new PDO("mysql:host=$this->host;dbname=$this->database;charset=$this->charset", $this->username, $this->password);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
