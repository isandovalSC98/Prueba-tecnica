<?php 
require_once "modelo/DatosBase.php";
class Inicio{

    private $datosBase;
    public function __construct() {
        
        $this->datosBase = new DatosBase();
    }

    public function inicio(){
        $bodegas = $this->datosBase->obtenerBodegas();
        $monedas = $this->datosBase->obtenerMoneda();
        include "vista/plantilla.php";
    }

    public function obtenerSucursalPorId()
    {
        $idBodega = $_POST['id_bodega'];
        $sucursales =  $this->datosBase->obtenerSucursalPorId($idBodega);
        echo json_encode($sucursales);
    }

    public function validaCodigoExistente()
    {
        $codigo = $_POST['codigo'];
        $valida =  $this->datosBase->validaCodigoExistente($codigo);
        echo json_encode($valida);
    }

    public function envioDatos()
    {
        $codigo = trim($_POST['codigo']);
        $nombre = $_POST['nombre'];
        $bodega = $_POST['bodega'];
        $surcursal = $_POST['sucursal'];
        $moneda = $_POST['moneda'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $datos =  $this->datosBase->envioDatos($codigo,$nombre,$bodega,$surcursal,$moneda,$precio,$descripcion);
        echo json_encode($datos);
    }
}
?>