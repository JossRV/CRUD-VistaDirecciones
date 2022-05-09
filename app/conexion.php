<?php 

    class Conexion{
        public function conectar(){
            $servidor = 'localhost';
            $user = 'root';
            $pasword = '';
            $bd = 'direcciones';
            try {
                return $conexion = new mysqli(
                    $servidor,
                    $user,
                    $pasword,
                    $bd
                );
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    // $c = new Conexcion();
    // if($c -> conectar()){
    //     echo 'conectado';
    // }

?>