<?php require 'employees.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <style>
        .container {
            margin-left: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        @media (min-width: 768px) {
            .col-md-6 {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar Empleado
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Id:</label>
                                <input type="number" name="id" placeholder="" value="<?php echo $id; ?>" id="id" require reedonly class="form-control">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="first_name" class="form-control col-md-6 <?php echo (isset($error['first_name'])) ? "is-invalid" : ""; ?>" placeholder="" value="<?php echo $first_name; ?>" id="first_name" require>
                                    <di class="invalid-feedback">
                                        <?php echo (isset($error['first_name'])) ? $error['first_name'] : ""; ?>
                                    </di>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Apellido:</label>
                                    <input type="text" name="last_name" placeholder="" value="<?php echo $last_name; ?>" id="last_name" require class="form-control col-md-6">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Correo:</label>
                                    <input type="text" name="email_address" placeholder="" value="<?php echo $email_address; ?>" id="email_address" require class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Titulo:</label>
                                    <input type="text" name="job_title" placeholder="" value="<?php echo $job_title; ?>" id="job_title" require class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Teléfono:</label>
                                    <input type="text" name="home_phone" placeholder="" value="<?php echo $home_phone; ?>" id="home_phone" require class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Celular:</label>
                                    <input type="text" name="mobile_phone" placeholder="" value="<?php echo $mobile_phone; ?>" id="mobile_phone" require class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Dirección:</label>
                                    <input type="text" name="address" placeholder="" value="<?php echo $address; ?>" id="address" require class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ciudad:</label>
                                    <input type="text" name="city" placeholder="" value="<?php echo $city; ?>" id="city" require class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">

                            <button value="btnAgregar" <?php echo $accionAgregar ?> class="btn btn-primary" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" <?php echo $accionModificar ?> type="submit" name="accion" class="btn btn-info">Modificar</button>
                            <button value="btnEliminar" <?php echo $accionEliminar ?> type="submit" name="accion" class="btn btn-danger">Eliminar</button>
                            <button value="btnCancelar" <?php echo $accionCancelar ?> class="btn btn-secondary" type="submit" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Titulo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Celular</th>
                <th scope="col">Dirección</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <?php foreach ($listaEmpleados as $empleado) { ?>
            <tr>
                <th><?php echo $empleado['id']; ?></th>
                <td><?php echo $empleado['first_name']; ?></td>
                <td><?php echo $empleado['last_name']; ?></td>
                <td><?php echo $empleado['email_address']; ?></td>
                <td><?php echo $empleado['job_title']; ?></td>
                <td><?php echo $empleado['home_phone']; ?></td>
                <td><?php echo $empleado['mobile_phone']; ?></td>
                <td><?php echo $empleado['address']; ?></td>
                <td><?php echo $empleado['city']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
                        <input type="hidden" name="company" value="<?php echo $empleado['company']; ?>">
                        <input type="hidden" name="last_name" value="<?php echo $empleado['last_name']; ?>">
                        <input type="hidden" name="first_name" value="<?php echo $empleado['first_name']; ?>">
                        <input type="hidden" name="email_address" value="<?php echo $empleado['email_address']; ?>">
                        <input type="hidden" name="job_title" value="<?php echo $empleado['job_title']; ?>">
                        <input type="hidden" name="home_phone" value="<?php echo $empleado['home_phone']; ?>">
                        <input type="hidden" name="mobile_phone" value="<?php echo $empleado['mobile_phone']; ?>">
                        <input type="hidden" name="address" value="<?php echo $empleado['address']; ?>">
                        <input type="hidden" name="city" value="<?php echo $empleado['city']; ?>">

                        <input type="submit" value="Seleccionar" class="btn btn-info" name="accion">
                        <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                    </form>

                </td>
            </tr>
        <?php } ?>
    </table>
    <?php if ($mostrarModal) { ?>
        <script>
            $('#exampleModal').modal('show');
        </script>
    <?php } ?>

</body>

</html>