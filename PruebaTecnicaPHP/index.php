<?php
require_once "controlador/inicio.controlador.php";

$controlador = new Inicio();

if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
        case 'obtenerSucursalPorId':
            $controlador->obtenerSucursalPorId();
            break;

        case 'validaCodigoExistente':
            $controlador->validaCodigoExistente();
            break;

        case 'envioDatos':
            $controlador->envioDatos();
            break;

        default:
            $controlador->inicio();
            break;
    }
} else {
    $controlador->inicio();
}
?>
