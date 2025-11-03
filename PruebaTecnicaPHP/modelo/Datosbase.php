<?php 
    include "modelo/conexion.php";

    class Datosbase{

        private $conexion;

        public function __construct() {
            $db = new Conexion();
            $this->conexion = $db->ConexionBD();
        }

        public function obtenerBodegas() {
            $sql = "SELECT * FROM BODEGA";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function obtenerSucursalPorId($id) {
            $sql = "SELECT S.id_sucursal,S.nombre_sucursal
                    FROM SUCURSAL S
                    INNER JOIN BODEGA B ON S.id_bodega = B.id_bodega
                    WHERE B.id_bodega = :id";
            
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function obtenerMoneda() {
            $sql = "SELECT * FROM MONEDA";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function validaCodigoExistente($codigo)
        {
            $sql = "select cod_producto from PRODUCTO where cod_producto = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $codigo, PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return true;
            }else{
                return false;
            }

        }

        public function envioDatos($codigo,$nombre,$bodega,$sucursal,$moneda,$precio,$descripcion)
        {
            $sql = "INSERT INTO PRODUCTO(cod_producto, nombre_producto, id_bodega, id_sucursal, moneda, precio, descripcion_producto) 
                    values(:codigo, :nombre, :bodega, :sucursal, :moneda, :precio, :descripcion)";
            $stmt = $this->conexion->prepare($sql);

            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':bodega', $bodega, PDO::PARAM_INT);
            $stmt->bindParam(':sucursal', $sucursal, PDO::PARAM_INT);
            $stmt->bindParam(':moneda', $moneda, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

            $stmt->execute();
            return "OK";

        }


    }


?>