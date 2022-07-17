<?php

    namespace model;

    class Personnage
    {
        const myself = 1;
        const killed = 2;
        const hit = 3;
        private int $id;
        private string $name;
        private int $status;
        private int $hp;

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName(string $name): void
        {
            $this->name = $name;
        }

        /**
         * @return int
         */
        public function getHp(): int
        {
            return $this->hp;
        }

        /**
         * @param int $hp
         */
        public function setHp(int $hp): void
        {
            $this->hp = $hp;
        }

        /**
         * @return int
         */
        public function getStatus(): int
        {
            return $this->status;
        }

        /**
         * @param int $status
         */
        public function setStatus(int $status): void
        {
            $this->status = $status;
        }
    }
