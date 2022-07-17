<?php

    namespace model\dto;

    class PersonnageDto
    {
        private string $nom;

        /**
         * @return string
         */
        public function getNom(): string
        {
            return $this->nom;
        }

        /**
         * @param string $nom
         */
        public function setNom(string $nom): void
        {
            $this->nom = htmlspecialchars($nom);
        }
    }
