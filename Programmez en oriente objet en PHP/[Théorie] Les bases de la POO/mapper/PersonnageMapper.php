<?php

    namespace mapper;

    use model\dto\PersonnageDto;
    use model\Personnage;

    class PersonnageMapper
    {

        private static ?PersonnageMapper $instance = null;


        public static function getInstance()
        {
            if (is_null(self::$instance)) {
                self::$instance = new PersonnageMapper();
            }
            return self::$instance;
        }


        public function mapPostToPersonnageDto(array $post): PersonnageDto
        {
            $persoDto = new PersonnageDto();
            $persoDto->setNom($post['nom']);
            return $persoDto;
        }

        public function mapDtoToPersonnage(PersonnageDto $personnage): Personnage
        {
            $perso = new Personnage();
            $perso->setId(0);
            $perso->setHp(0);
            $perso->setStatus(1);
            $perso->setName($personnage->getNom());
            return $perso;
        }

    }
