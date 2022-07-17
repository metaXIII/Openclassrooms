<?php

    namespace services;


    use model\dto\PersonnageDto;

    interface PersonnageService
    {
        public function savePersonnage(PersonnageDto $personnage);

        public function findByName(PersonnageDto $personnageDto);

        public function findAll();
    }
