<?php 

    class incidencia{

        /**
         * Atributos
         */
        private int $id;
        private string $dispositivo;
        private string $problema;
        private string $fechaIngreso;
        private string $fechaTerminado = "";
        private string $estado;
        private string $observaciones = "";
        
        /**
         * Constructor
         */
        public function __construct(int $id,string $dispositivo,string $problema,string $fechaIngreso,string $estado){
           
            $this->id = $id;
            $this->dispositivo = $dispositivo;
            $this->problema = $problema;
            $this->fechaIngreso = $fechaIngreso;
            $this->estado = $estado;

        }
        
        /**
         * Getters
         */
        public function getId() : int { return $this->id; }
        public function getDispositivo() : string { return $this->dispositivo; }
        public function getProblema() : string { return $this->problema; }
        public function getFechaIngreso() : string { return $this->fechaIngreso; }
        public function getFechaTerminado() : string { return $this->fechaTerminado; }
        public function getEstado() : string { return $this->estado; }
        public function getObservaciones() : string { return $this->observaciones; }
      
    }

    
?>