<?php
require_once "../../backend/class/cuentas.php";
$idcuenta=$_GET['idcuenta'];
$cuen = new Cuenta();
$listar=$cuen->listarcuenta($idcuenta);
$ver=mysqli_fetch_row($listar);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../../librerias/bootstrap-4.4/bootstrap.min.css">
        <title>Reporte Cuenta</title>
    </head>
    <body>

         <table class="table table-bordered text-center">
                <tr>
                    <th colspan="5">
                        <img src="../../../logo/pollito.png" width="90px;" height="90px;" class="ml-auto"><p class="text-center pl-2" style="font-size:20px;">Pollos San Pedro C.A <br>Rif:J-40346843-5 <br>Carrera 17 entre calle 1 Capachito Parte Alta</p></th>
                </tr>
                    <tr>
                        <th colspan="5" class="text-center">Datos Cliente</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Rif</th>
                        <th>Direccion</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td><?php echo $ver[3];?></td>
                            <td><?php echo $ver[4];?></td>
                            <td><?php echo $ver[5];?></td>
                            <td><?php echo $ver[6];?></td>
                            <td><?php echo $ver[7];?></td>
                        </tr>
                    </tbody>
         </table>
        <br>
        <br>
        <br>
         <table class="table table-bordered text-center">
                    <tr>
                        <th colspan="7" class="">Datos Cuenta</th>
                    </tr>
                    <tr>
                      <td>Cantidad de la Cuenta</td>
                      <td>Cantidad despacho</td>
                      <td>N° Referencia</td>
                      <td>Banco Empresa</td>
                      <td>Rif o Cedula</td>
                      <td>Banco Cliente</td>
                      <td>Fecha Despacho</td>
                    </tr>
                    <tbody>
                        <tr>
                            <td><?php echo $ver[1]."Bs";?></td>
                            <td><?php echo $ver[2]."Bs";?></td>
                            <td><?php echo $ver[0];?></td>
                            <td><?php echo $ver[8];?></td>
                            <td><?php echo $ver[9];?></td>
                            <td><?php echo $ver[10];?></td>
                            <td><?php echo $ver[11];?></td>
                        </tr>
                    </tbody>
         </table>
    </body>
</html>