<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script>
        function validarform() {
            var value = document.forms["form"]["id"].value;
            if (value == "") {
                alert("No puede ir vacio el id,por favor llenarlo");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">PHP TEST</a>
            </div>
        </nav>
        <div class="container p-4">
            <?php include("conexion.php");?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="create.php">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="Ingresa ID"
                                    autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ingresa nombre"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Ingresa direccion"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Ingresa telefono"
                                    autocomplete="off" required>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="send" value="Agregar">
                            <input type="reset" class="btn btn-secondary btn-block" value="Limpiar">
                        </form>
                    </div>
                </div> 
                <div class="col-md-8">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Borrar o actualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM datos";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)){ 
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['dirrecion'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>
</body>

</html>