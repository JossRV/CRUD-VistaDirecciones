<?php 
    session_start();
    require_once "app/config.php";
    require_once "app/dependencias.php";

    require_once "model/crudDireccion.php";
    require_once "app/conexion.php";
    $crud = new Crud();
    $datos = $crud -> listarDirecciones();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=TITULO_PAGINA?></title>
</head>

<body>
    <div class="container mt-4">
        <div class="row mt-3 mb-3">
            <div class="col">
                <h1 class="display2 text-center">Crud Direcciones y Datos Personales</h1>
            </div>
        </div>
        <!-- registro nuevo -->
        <div class="row mt-3">
            <div class="col"></div>
            <div class="col">
                <button type="button" class="btn btn-outline-dark container-fluid" data-bs-toggle="collapse" data-bs-target="#registro"> 
                    Nuevo registro  <i class="fa-duotone fa-circle-plus"></i>
                </button>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <!-- Collapse registro -->
                <div class="collapse mt-3" id="registro">
                    <div class="card card-body">
                        <form action="model/registarDatos.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="paterno" id="paternoR" class="form-control" placeholder="Paterno" required>
                                        <label for="">Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="materno" id="maternoR" class="form-control" placeholder="materno" required>
                                        <label for="">Apellido Materno</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nombre"id="nombreR" class="form-control" placeholder="nombre" required>
                                        <label for="">Nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="calle" id="calleR" class="form-control" placeholder="calle" required>
                                        <label for="">Calle</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="colonia" id="coloniaR" class="form-control" placeholder="colonia" required>
                                        <label for="">Colonia</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="delegacion" id="delegacionR" class="form-control" placeholder="delegacion" required>
                                        <label for="">Delegacion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="estado" id="estadoR" class="form-control" placeholder="estado" required>
                                        <label for="">Estado</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="cp" id="cpR" class="form-control" placeholder="cp" required>
                                        <label for="">Codigo Postal</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" id="btn_registrar" class="btn btn-outline-dark container-fluid mt-2">Guardar Registro</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <hr>
        <!-- tabla  -->
        <div class="row mt-4">
            <div class="col">
                <table class="table" id="tablaDireccion" style="width:100%">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido Materno</th>
                        <th>Calle</th>
                        <th>Colonia</th>
                        <th>Delegación</th>
                        <th>Estado</th>
                        <th>CP</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($datos as $item):
                        ?>
                        <tr>
                            <td><?= $item['nombrePersona'] ?></td>
                            <td><?= $item['paterno'] ?></td>
                            <td><?= $item['materno'] ?></td>
                            <td><?= $item['calle'] ?></td>
                            <td><?= $item['colonia'] ?></td>
                            <td><?= $item['delegacion'] ?></td>
                            <td><?= $item['estado'] ?></td>
                            <td><?= $item['cp'] ?></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php 

    if(isset($_SESSION['registro'])=='insertado'){
        echo ' 
            <script>
                swal({
                    title: "Se guardaron los datos",
                    icon: "success",
                    button: "Aceptar",
                    timmer: "2000"
                });
            </script>
        ';
        unset($_SESSION['registro']);
    }else if(isset($_SESSION['registro'])=='noInsertado'){
        echo ' 
            <script>
                swal({
                    title: "No sx|e guardaron los datos",
                    icon: "error",
                    button: "Aceptar",
                    timmer: "2000"
                });
            </script>
        ';
        unset($_SESSION['registro']);
    }

?>