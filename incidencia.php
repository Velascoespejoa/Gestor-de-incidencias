<?php 

    class incidencia{

        /**
         * Atributos
         */
        private int $id;
        private int $clienteId;
        private string $dispositivo;
        private string $problema;
        private string $fechaIngreso;
        private string $fechaTerminado = "";
        private string $estado;
        private string $observaciones;
        
        /**
         * Constructor
         */
        public function __construct(int $id,int $clienteId,string $dispositivo,string $problema,string $estado , string $observaciones = ""){
           
            $this->id = $id;
            $this->clienteId = $clienteId;
            $this->dispositivo = $dispositivo;
            $this->problema = $problema;
            $this->estado = $estado;
            $this->observaciones = $observaciones;

        }
        
        /**
         * Getters
         */
        public function getId() : int { return $this->id; }
        public function getClienteId() : int { return $this->clienteId; }
        public function getDispositivo() : string { return $this->dispositivo; }
        public function getProblema() : string { return $this->problema; }
        public function getFechaIngreso() : string { return $this->fechaIngreso; }
        public function getFechaTerminado() : string { return $this->fechaTerminado; }
        public function getEstado() : string { return $this->estado; }
        public function getObservaciones() : string { return $this->observaciones; }
      
    }

    
?>