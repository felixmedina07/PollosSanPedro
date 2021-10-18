<?php
//require_once "../../backend/class/conexion.php";
require_once "../../backend/class/despacho.php";
//nom_cli,ape_cli,ced_cli,rif_cli,ads_cli
$iddespacho= $_GET['iddespacho'];
$cli= new Despacho();
$listar=$cli->listar($iddespacho);
$ver= mysqli_fetch_row($listar);
 //cestas redondeadas
$cesta=round($ver[3]) + round($ver[4]) + round($ver[5]) + round($ver[6]);
//cestas redondeadas
$po=round($ver[3]) * $ver[20];
$pa=round($ver[4]) * $ver[20];
$al=round($ver[5]) * $ver[20];
$mo=round($ver[6]) * $ver[20];
$cant_n=($ver[7] + $po) + ($ver[8] + $pa) + ($ver[9] + $al) + ($ver[10] + $mo);
$cant_m=($ver[7] + $ver[8] + $ver[9] + $ver[10]); 
//promedio peso pollo
$p_po=$ver[3] * $ver[21];
$peso=($ver[7] / $p_po); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../../librerias/bootstrap-4.4/bootstrap.min.css">
        <title>Reporte Despacho</title>
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
                            <td><?php echo $ver[15]; ?></td>
                            <td><?php echo $ver[16]; ?></td>
                            <td><?php echo $ver[17]; ?></td>
                            <td><?php echo $ver[18]; ?></td>
                            <td><?php echo $ver[19]; ?></td>
                        </tr>
                    </tbody>
         </table>
        <br>
        <br>
        <br>
         <table class="table table-bordered text-center">
                    <tr>
                        <th colspan="7" class="">Datos Despacho</th>
                    </tr>
                    <tr>
                        <th>Precio En Bolivares</th>
                        <th>Precio En Dolares</th>
                        <th>Total de Cestas</th>
                        <th>Peso Neto</th>
                        <th>Peso Bruto</th>
                        <th>Promedio General</th>
                        <th>Promedio Despacho</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td><?php echo $ver[1]."Bs";?></td>
                            <td><?php echo $ver[2]."$";?></td>
                            <td><?php echo $cesta."cesta";?></td>
                            <td><?php echo $cant_m."Kg";?></td>
                            <td><?php echo $cant_n."Kg";?></td>
                            <td><?php echo $ver[22]."Kg";?></td>
                            <td><?php echo $peso."Kg";?></td>
                        </tr>
                    </tbody>
         </table>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <table class="table table-bordered text-center">
                    <tr>
                        <th colspan="4" class="">Detalles Despacho</th>
                    </tr>
                    <tr>
                        <th>Pollo</th>
                        <th>Patas</th>
                        <th>Alas</th>
                        <th>Mollejas</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td><?php echo $ver[3]."cesta"." "."Pollo";?></td>
                            <td><?php echo $ver[4]."cesta"." "."Patas";?></td>
                            <td><?php echo $ver[5]."cesta"." "."Alas";?></td>
                            <td><?php echo $ver[6]."cesta"." "."Mollejas";?></td>
                        </tr>
                        <tr>
                            <td><?php echo $ver[7]."Kg"." "."Pollo Peso";?></td>
                            <td><?php echo $ver[8]."Kg"." "."Patas Peso";?></td>
                            <td><?php echo $ver[9]."Kg"." "."Alas Peso";?></td>
                            <td><?php echo $ver[10]."Kg"." "."Mollejas Peso";?></td>
                        </tr>
                        <tr>
                            <td><?php echo $ver[11]."Bs"." "."Pollo Precio";?></td>
                            <td><?php echo $ver[12]."Bs"." "."Patas Precio";?></td>
                            <td><?php echo $ver[13]."Bs"." "."Alas Precio";?></td>
                            <td><?php echo $ver[14]."Bs"." "."Mollejas Precio";?></td>
                        </tr>
                    </tbody>
         </table>
    </body>
</html>