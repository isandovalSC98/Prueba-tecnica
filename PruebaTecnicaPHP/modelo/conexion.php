<?php 
    class Conexion{

        public static function ConexionBD(){

            $host = "localhost";
            $dbname = "Desis";
            $usrname = "postgres";
            $password = "12345";
            try {
                $conn = new PDO("pgsql:host=$host; dbname=$dbname", $usrname, $password);
                //echo "Conexion exitosa";
            } catch (PDOException $exp) {
               echo "Error de conexion, $exp";
            }
            return $conn;
        }
    }
?>