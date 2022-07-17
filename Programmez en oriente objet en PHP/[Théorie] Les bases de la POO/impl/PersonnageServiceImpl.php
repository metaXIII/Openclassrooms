<?php

    namespace impl;

    use mapper\PersonnageMapper;
    use model\dto\PersonnageDto;
    use model\Personnage;
    use repositories\PersonnageRepository;
    use services\PersonnageService;

    class PersonnageServiceImpl implements PersonnageService
    {
        private static ?PersonnageServiceImpl $instance = null;
        private ?PersonnageMapper $personnageMapper;
        private ?PersonnageRepository $personnageRepository;

        /**
         * PersonnageServiceImpl constructor.
         */
        public function __construct()
        {
            $this->personnageMapper = PersonnageMapper::getInstance();
            $this->personnageRepository = PersonnageRepository::getInstance();
        }

        public static function getInstance(): PersonnageServiceImpl
        {
            if (is_null(self::$instance))
                self::$instance = new PersonnageServiceImpl();
            return self::$instance;
        }

        public function savePersonnage(PersonnageDto $personnage)
        {
            if (!$this->personnageRepository->findByName($personnage->getNom()))
                $this->personnageRepository->savePersonnage($this->personnageMapper->mapDtoToPersonnage($personnage));
            else
                $_SESSION["error"] = "Un utilisateur porte déjà ce nom";
        }

        public function findAll()
        {
            return $this->personnageRepository->findAll();
        }

        public function hitSomeone(Personnage $hitter, Personnage $hitted)
        {
            if ($hitter->getName() === $hitted->getName()) {
                $hitter->setStatus($hitter::myself);
                $_SESSION["perso"] = $hitter;
                $_SESSION["error"] = "Vous ne pouvez pas vous attaquer vous même";
                return;
            }
            $this->getHit($hitted);
        }

        function getHit(Personnage $personnage)
        {
            $personnage->setHp($personnage->getHp() + 5);
            $personnage->setStatus($personnage->getHp() === 100 ? $personnage::killed : $personnage::hit);
            if ($personnage->getStatus() === $personnage::killed)
                $this->personnageRepository->deleteFromId($personnage->getId());
            else
                $this->personnageRepository->updatePersonnage($personnage);
        }

        public function findByName(PersonnageDto $personnageDto)
        {
            return $this->personnageRepository->findByName($personnageDto->getNom());
        }

    }
