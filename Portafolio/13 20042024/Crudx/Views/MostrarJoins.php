<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TABLAS RELACIONADAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <h1 class="text-center" style="background-color: black; color:white">JOINS</h1>
    </div>

    
    <div class="container">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>

                    <th scope="col">Id</th>
                    <th scope="col">Calle</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">ID Usuario</th> 

                </tr>
            </thead>
            <tbody>

                   <?php

                        require("../Config/Conexion.php");

                        $sql= $conexion->query("select * from usuarios join almacen
                                                  on usuarios.id = almacen.id_usuario ");

                        while($reg = $sql->fetch_assoc())
                        { 
                    ?>
                                <tr>
                                    <td scope="row"> <?php echo $reg['id'] ?> </td>
                                    <td scope="row"> <?php echo $reg['nombre'] ?> </td>
                                    <td scope="row"> <?php echo $reg['email'] ?> </td>
                                    <td scope="row"> <?php echo $reg['edad'] ?> </td>


                                    <td scope="row"> <?php echo $reg['id'] ?> </td>
                                    <td scope="row"> <?php echo $reg['calle'] ?> </td>
                                    <td scope="row"> <?php echo $reg['ciudad'] ?> </td>
                                    <td scope="row"> <?php echo $reg['id_usuario'] ?> </td>
                                  
                                </tr>
                     <?php
                        }
                        
                     ?>
                    
                   
             </tbody>
        </table>

        <div class="container">
           
            <a href="Views/MostrarJoins.php" class="btn btn-success"> Mostrar Joins </a>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>