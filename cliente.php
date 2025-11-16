<?php 

    class Cliente{

        /**
         * Atributos
         */
        private int $id;
        private string $nombre;
        private string $correo;
        private int $tlf;

        /**
         * Constructor
         */
        public function __construct(int $id, string $nombre, string $correo, int $tlf){

            $this->id = $id;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->tlf = $tlf;
            
        }

        /**
         * Geters
         */
        public function getId() : int { return $this->id;}
        public function getTelefono() : int { return $this->tlf;}
        public function getNombre() : string { return $this->nombre;}
        public function getCorreo() : string { return $this->correo;}
    }

?>