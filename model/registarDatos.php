<?php 
    session_start();
    require_once "./crudDireccion.php";
    require_once "../app/conexion.php";

    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $nombre = $_POST['nombre'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $delegacion = $_POST['delegacion'];
    $estado = $_POST['estado'];
    $cp = $_POST['cp'];

    $data = array(
        $paterno,
        $materno,
        $nombre,
        $calle,
        $colonia,
        $delegacion,
        $estado,
        $cp
    );

    $inserta = new Crud();

    if($inserta -> agregarDireccionPersona($data)==0){
        $_SESSION['registro']='insertado';
        header("location:../index.php");
    }else{
        $_SESSION['registro']='noInsertado;';
        header("location:../index.php");
    }

?>