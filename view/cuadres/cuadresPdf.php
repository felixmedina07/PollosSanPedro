<?php 
require_once('../../backend/class/cuadres.php');
$edo = new Cuadre();
$idcuadre=$_GET['idcuadre'];
$listar=$edo->listar($idcuadre);
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
            <th colspan="5"><img src="../../../logo/pollito.png" width="90px;" height="90px;" class="ml-auto">
                <p class="text-center pl-2" style="font-size:20px;">Pollos San Pedro C.A <br>Rif:J-40346843-4 <br>Carrera 17 entre calle 1 Capachito Parte Alta</p>
            </th>
        </tr>
        <tr>
            <th colspan="5" class="text-center">Datos Cliente</th>
        </tr>
        <tr>
            <th>Nombre Cliente</th>
            <th>Apellido Cliente</th>
            <th>Cedula Cliente</th>
            <th>Rif Cliente</th>
            <th>Direccion Cliente</th>
        </tr>
        <tbody>
            <tr>
                <td><?php echo $ver[0];?></td>
                <td><?php echo $ver[1];?></td>
                <td><?php echo $ver[2];?></td>
                <td><?php echo $ver[3];?></td>
                <td><?php echo $ver[4];?></td>
            </tr>
        </tbody>
    </table>
    <br>
<table class="table table-bordered text-center">
    <tr>
        <th colspan="5" class="text-center">Datos Cuadres</th>
    </tr>
    <tr>
        <td>Cantidad del Pollo</td>
        <td>Cantidad de Patas</td>
        <td>Cantidad de Alas</td>
        <td>Cantidad de Mollejas</td>
        <td>Precio del Despacho</td>
    </tr>
    <tbody>
            <tr>
                <td><?php echo $ver[5];?></td>
                <td><?php echo $ver[6];?></td>
                <td><?php echo $ver[7];?></td>
                <td><?php echo $ver[8];?></td>
                <td><?php echo $ver[9];?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>