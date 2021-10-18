<?php 
require_once "../../backend/class/conexion.php";
$idproducto=$_GET['idproducto'];
$obj = new Conectar();
$conexion= $obj->conexion();
$sql="SELECT cod_pro,
             tas_pro,
             tpo_pro,
             tpa_pro,
             tmo_pro,
             tal_pro,
             ppo_pro,
             ppa_pro,
             pal_pro,
             pmo_pro,
             csp_pro,
             ces_pro,
             prp_pro,
             cpo_pro,
             cpa_pro,
             cal_pro,
             cmo_pro,
             act_pro,
             fcp_pro,
             fdp_pro,
             cod_edo FROM productos WHERE cod_pro='$idproducto'";
$result=mysqli_query($conexion,$sql);
$ver=mysqli_fetch_row($result);
$sql2="SELECT nom_edo,rif_edo,cor_edo,dir_edo FROM proovedor WHERE cod_edo='$ver[20]'";
$result2=mysqli_query($conexion,$sql2);
$ver2=mysqli_fetch_row($result2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../../librerias/bootstrap-4.4/bootstrap.min.css">
        <title>Reporte Producto</title>
    </head>
    <body>
        <table class="table table-bordered text-center">
            <tr>
                <th colspan="4">
                    <img src="../../../logo/pollito.png" width="70px;" height="70px;" class="ml-auto"><p class="text-center pl-2" style="font-size:17px;">Pollos San Pedro C.A <br>Rif:J-40346843-5 <br>Carrera 17 entre calle 1 Capachito Parte Alta</p></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Datos Proovedor</th>
                </tr>
                <tr>
                  <td>Nombre</td>
                  <td>Rif</td>
                  <td>Correo</td>
                  <td>Direccion</td>
                </tr>
                <tbody>
                    <tr>
                        <td><?php echo $ver2[0];?></td>
                        <td><?php echo $ver2[1];?></td>
                        <td><?php echo $ver2[2];?></td>
                        <td><?php echo $ver2[3];?></td>
                    </tr>
                </tbody>
        </table>
        <p class="pb-3"></p>
        <table class="table table-bordered text-center">
            <tr>
                <th colspan="6" class="text-center">Datos Producto</th>
            </tr>
            <tr>
              <td>Fecha Salida</td>
              <td>Fecha LLegada</td>
              <td>Promedio del Pollo</td>
              <td>Precio General</td>
              <td>Cantidad de Pollo Total</td>
              <td>Estado</td>
            </tr>
            <tbody>
                <tr>
                    <td><?php echo $ver[18];?></td>
                    <td><?php echo $ver[19];?></td>
                    <td><?php echo $ver[12]."Kg";?></td>
                    <td><?php echo $ver[1]."Bs";?></td>
                    <td><?php echo $ver[13]."Und";?></td>
                   <td>
                   <?php if($ver[17] == 'A'):?><p>Activo</p><?php endif;?><?php if($ver[17] == 'B'): ?><p>Desactivo</p><?php endif; ?>
                   </td>
                </tr>
            </tbody>
        </table>
        <p class="pb-3"></p>
        <table class="table table-bordered text-center">
            <tr>
                <th colspan="6" class="text-center">Cantidad Producto</th>
            </tr>
            <tr>
                <td>Cantidad Pollo</td>
                <td>Cantidad Patas</td>
                <td>Cantidad Alas</td>
                <td>Cantidad Molleja</td>
                <td>Peso de Cestas Vacias</td>
                <td>Pollo por Cesta</td>
            </tr>
            <tbody>
                <tr>
                    <td><?php echo $ver[13]."Und";?></td>
                    <td><?php echo $ver[14]."Kg";?></td>
                    <td><?php echo $ver[15]."Kg";?></td>
                    <td><?php echo $ver[16]."Kg";?></td>
                    <td><?php echo $ver[10]."Kg";?></td>
                    <td><?php echo $ver[11]."Pollos";?></td>
                </tr>
            </tbody>
        </table>
        <p class="pb-3"></p>
        <table class="table table-bordered text-center">
            <tr>
                <th colspan="4" class="text-center">Precio Producto</th>
            </tr>
            <tr>
                <td>Precio Pollos</td>
                <td>Precio Patas</td>
                <td>Precio Alas</td>
                <td>Precio Mollejas</td>
            </tr>
            <tbody>
                <tr>
                    <td><?php echo $ver[6]."Bs";?></td>
                    <td><?php echo $ver[7]."Bs";?></td>
                    <td><?php echo $ver[8]."Bs";?></td>
                    <td><?php echo $ver[9]."Bs";?></td>
                </tr>
            </tbody>
        </table>
       
    </body>
</html>