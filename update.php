<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script>
        function validarform() {
            var x = document.forms["form"]["id"].value;
            if (x == "") {
                alert("El campo de id no puede ir vacio");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-dark  bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">PHP TEST</a>
            </div>
        </nav>
        <?php
            include("conexion.php");
            if(isset($_GET['id'])){ 
                $id = $_GET['id'];

                $query = "SELECT * FROM datos WHERE id = $id";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    $id = $row['id'];
                    $name = $row['nombre'];
                    $address = $row['dirrecion'];
                    $phone = $row['telefono'];
                }
            }
            if(isset($_POST['update'])){
                $id = $_GET['id'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                $update = "UPDATE datos set nombre = '$name', dirrecion ='$address', telefono = '$phone' WHERE id = $id";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info';
                header('Location:index.php');
            }
        ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <form name="form" action="update.php?id=<?php echo $_GET['id'];?>"
                            onsubmit="return validarform()" method="POST">
                            <div class="form-group">
                                ID <input type="text" name="id" value="<?php echo $id; ?>" class="form-control"
                                    placeholder="Actualiza ID" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                Nombre<input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                                    placeholder="Actualiza Nombre" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Direccion<input type="text" name="address" value="<?php echo $address; ?>"
                                    class="form-control" placeholder="Uptate ID" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Telefono<input type="text" name="phone" value="<?php echo $phone; ?>"
                                    class="form-control" placeholder="Uptate ID" autocomplete="off" required>
                            </div>
                            <button class="btn btn-success btn-block" name="update">
                                Actualizar
                            </button>
                        </form>
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
</body>

</html>