<?php 

    // require_once "app/conexion.php";

    class Crud{
        public function listarDirecciones(){
            $c = new Conexion();
            $conexion = $c -> conectar();
            $sql = "SELECT * FROM v_personas_direcciones";
            $respuesta = mysqli_query($conexion,$sql);
            return mysqli_fetch_all ($respuesta,MYSQLI_ASSOC);
        }

        public function agregarDireccion($datos){
            $c = new Conexion();
            $conexion = $c -> conectar();
            $sql = "INSERT INTO t_direcciones(calle,colonia,delegacion,estado,CP)
                    VALUES ('$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
            $resultado = mysqli_query($conexion,$sql);
            return mysqli_insert_id($conexion);
        }
        public function agregarPersona($datos,$idDireccion){
            $c = new Conexion();
            $conexion = $c -> conectar();
            $sql = "INSERT INTO t_personas(id_direccion,nombre,paterno,materno)
                    VALUES ('$idDireccion','$datos[2]','$datos[0]','$datos[1]')";
            return $respuesta = mysqli_query($conexion,$sql);
        }
        public function agregarDireccionPersona($datos){
            $idDireccion = $this -> agregarDireccion($datos);
            if($idDireccion > 0){
                $this -> agregarPersona($datos, $idDireccion);
            }
        }
    }

?>