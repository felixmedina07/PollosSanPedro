<?php 
require_once('../../backend/class/trabajadores.php');
$tra = new Trabajador();
$idtrab=$_GET['idtrab'];
$listar=$tra->listar($idtrab);
$listarBanco = $tra->listarbanco($idtrab);
$ver=mysqli_fetch_row($listar);
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
            <img src="../../../logo/pollito.png" width="90px;" height="90px;" class="ml-auto">
            <p class="text-center pl-2" style="font-size:20px;">Pollos San Pedro C.A <br>Rif:J-40346843-5 <br>Carrera 17 entre calle 1 Capachito Parte Alta</p>
        </th>
    </tr>
    <tr>
        <th colspan="6" class="text-center">Datos Trabajador</th>
    </tr>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Direccion</th>
        <th>Correo</th>
        <th>Telefono</th>
    </tr>
    <tbody>
        <tr>
            <td><?php echo $ver[0];?></td>
            <td><?php echo $ver[1];?></td>
            <td><?php echo $ver[2];?></td>
            <td><?php echo $ver[3];?></td>
            <td><?php echo $ver[4];?></td>
            <td><?php echo $ver[5];?></td>
        </tr>
    </tbody>
</table>
<br>
<table class="table table-bordered text-center">
    <tr>
        <th colspan="7" class="text-center">Datos Banco Trabajador</th>
    </tr>
    <tr>
        <th>Nombre del Titular</th>
        <th>Numero de Cuenta</th>
        <th>Tipo de Cuenta</th>
        <th>Rif del banco</th>
        <th>Nombre del Banco</th>
        <th>Correo del Banco</th>
        <th>Telefono del Titular</th>
    </tr>
    <tbody>
        <?php while( $ver2= mysqli_fetch_row($listarBanco)):?>
            <tr>
                <td><?php echo $ver2[0];?></td>
                <td><?php echo $ver2[1];?></td>
                <td><?php echo $ver2[2];?></td>
                <td><?php echo $ver2[3];?></td>
                <td><?php echo $ver2[4];?></td>
                <td><?php echo $ver2[5];?></td>
                <td><?php echo $ver2[6];?></td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>