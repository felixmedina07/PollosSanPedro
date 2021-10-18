<?php 
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql="CALL sp_mostrar_cliente()";
  $result=mysqli_query($conexion,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../librerias/bootstrap-4.4/bootstrap.min.css">
    <title>Reporte Cliente</title>
</head>
<body>
<table class="table table-bordered text-center">
    <tr>
        <th colspan="6">
            <img src="../../../logo/pollito.png" width="80px;" height="80px;" class="ml-auto">
            <p class="text-center pl-2" style="font-size:18px;">Pollos San Pedro C.A <br>Rif:J-40346843-5 <br>Carrera 17 entre calle 1 Capachito Parte Alta</p>
        </th>
    </tr>
    <tr>
        <th colspan="6" class="text-center">Datos Clientes</th>
    </tr>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Rif</th>
        <th>Correo</th>
        <th>Telefono</th>
    </tr>
    <tbody>
        <?php while( $ver= mysqli_fetch_row($result)):?>
            <tr>
                <td><?php echo $ver[0];?></td>
                <td><?php echo $ver[1];?></td>
                <td><?php echo $ver[2];?></td>
                <td><?php echo $ver[3];?></td>
                <td><?php echo $ver[4];?></td>
                <td><?php echo $ver[5];?></td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>