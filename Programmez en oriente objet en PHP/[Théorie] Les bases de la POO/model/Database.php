<?php

    namespace model;

    use PDO;

    class Database
    {
        private static string $username = "root";
        private static string $password = "root";
        private static string $host = "localhost";
        private static string $dbname = "oc-programmez-en-oriente-objet-en-php";
        private static string $charset = "utf8";


        private static ?PDO $instance = null;


        /**
         * Database constructor.
         */
        public function __construct()
        {
        }


        public static function getInstance(): PDO
        {
            if (is_null(self::$instance)) {
                $PDOConnection = "mysql:host=" . self::$host . "; dbname=" . self::$dbname . "; charset=" . self::$charset;
                self::$instance = new PDO($PDOConnection, self::$username, self::$password);
            }
            return self::$instance;
        }
    }
