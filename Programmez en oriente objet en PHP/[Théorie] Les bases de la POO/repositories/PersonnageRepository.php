<?php

    namespace repositories;

    use model\Database;
    use model\Personnage;
    use PDO;

    class PersonnageRepository
    {
        private static ?PersonnageRepository $personnageRepository = null;
        private PDO $database;

        /**
         * PersonnageRepository constructor.
         */
        public function __construct()
        {
            $this->database = Database::getInstance();
        }

        public static function getInstance()
        {
            if (is_null(self::$personnageRepository))
                self::$personnageRepository = new PersonnageRepository();
            return self::$personnageRepository;
        }

        public function findAll()
        {
            return $this->database->query("select * from personnage")->fetchAll(PDO::FETCH_CLASS, Personnage::class);
        }

        public function findById(int $id)
        {
            return $this->database->query("select * from personnage where id = :id")->fetch(["id" => $id]);
        }

        public function findByName(string $name)
        {
            $query = $this->database->prepare("select * from personnage where name = :name");
            $query->execute(["name" => $name]);
            return $query->fetchObject(Personnage::class);
        }


        public function savePersonnage(Personnage $personnage)
        {
            $this->database->prepare("insert into personnage (name, hp, status) VALUES (:nom, :hp, :status)")
                ->execute(["nom" => $personnage->getName(), "hp" => $personnage->getHp(), "status" => $personnage->getStatus()]);
            if ($personnage->getId() == 0)
                $personnage->setId($this->database->lastInsertId("Personnage"));
        }


        public function deleteFromId(int $id)
        {
            $this->database->query("delete from personnage where id = $id")->execute();
        }

        public function updatePersonnage(Personnage $personnage)
        {
            $this->database->prepare("update personnage set status = :statut, name = :nom, hp = :hp where id = :id")
                ->execute(["statut" => $personnage->getStatus(), "nom" => $personnage->getName(), "hp" => $personnage->getHp(), "id" => $personnage->getId()]);
        }
    }
