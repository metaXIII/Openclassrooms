<?php
    namespace OCFram;

    class PDOFactory
    {
        public static function getMysqlConnexion()
        {
            $db = new \PDO('mysql:host=localhost;dbname=oc-programmez-en-oriente-objet-en-php', 'root', 'root');
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $db;
        }
    }
