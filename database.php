<?php  

    class Database{

        public static ?PDO $conexion = null;

        public static function conectarBaseDatos(){

            if(!self::$conexion){
                $config =[
                    "DB_SERVER" => "localhost",
                    "DB_NAME" => "tienda",
                    "DB_USER" => "user_tienda",
                    "USER_PASS" => "1234qwer"
                ];
                $dsn = "mysql:host={$config['DB_SERVER']};dbname={$config['DB_NAME']};charset=utf8mb4";

                /**
                 * Falta trabajar la configuracio de la conexion
                 */

                self::$conexion = new PDO($dsn,$config["DB_USER"],$config["USER_PASS"]);
                /**
                 * Falta manejar excepciones con posibles errlres de conexion
                 */
                return self::$conexion;             
            }
            return self::$conexion;  
        }
        
    }


?>