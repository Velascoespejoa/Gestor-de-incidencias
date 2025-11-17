    <?php 

    require_once("database.php");
    require_once("cliente.php");

    class clienteDAO{
        private PDO $conexion;

        public function __construct(){
            $this->conexion = Database::conectarBaseDatos();
        }

        /**
         * Muestra todos los clientes
         */
        public function listarClientes(): array{

            $sql = "SELECT * FROM clientes";
            $consulta = $this->conexion->query($sql);
            $resultado = $consulta->fetchAll();
            $clientes = [];
            foreach ($resultado as $cliente) {
                $clientes[] = new Cliente($cliente["id"],$cliente["nombre"],$cliente["correo"],$cliente["telefono"]);                
            }
            return $clientes;
        }

        /**
         * funcion para buscar en la BBDD por id
         */
        public function buscarPorId(int $id){
            
            $sql = "SELECT * FROM clientes WHERE id = :id";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam("id",$id);
            $consulta->execute();

            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            if(!$resultado){
                return null;
            }
            return new Cliente($resultado["id"],$resultado["nombre"],$resultado["correo"],$resultado["telefono"]);
        }

        /**
         * funcion para buscar en la BBDD utilizando correo
         */
        public function buscarPorCorreo(string $correo): ?Cliente{
            
            $sql = "SELECT * from clientes WHERE correo = :correo";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(":correo",$correo);
            $consulta->execute();

            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            if(!$resultado){
                return null;
            }
            return new Cliente($resultado["id"],$resultado["nombre"],$resultado["correo"],$resultado["telefono"]);
        }

         /**
         * funcion para buscar en la BBDD utilizando telefono
         */
        public function buscarPorTlf(int $tlf): ?Cliente{
            $sql = "SELECT * from clientes WHERE telefono = :telefono";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(":telefono",$tlf,PDO::PARAM_INT);
            $consulta->execute();

            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            if(!$resultado){
                return null;
            }
            return new Cliente($resultado["id"],$resultado["nombre"],$resultado["correo"],$resultado["telefono"]);
        }

        /**
         * Crear un nuevo cliente en la BBDD
         */
        public function crearCliente(string $nombre,string $correo,int $tlf){
            
            $sql = "INSERT INTO clientes (nombre, correo, telefono)
            VALUES (:nombre, :correo, :telefono)";

            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":telefono",$tlf,PDO::PARAM_INT);
            $consulta->execute();
        }
    }

    

?>