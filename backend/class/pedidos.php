<?php
require_once("conexion.php");

class Pedidos extends Conectar{
    public function agregarPedido($datos){
        $_SESSION['error']= '';
        $conexion = Conectar::conexion();
        $cre_ped = date("Y-m-d h:i:s");
        $sql="INSERT INTO pedidos(cpo_ped,
                                 cpa_ped,
                                 cmo_ped,
                                 cal_ped,
                                 est_ped,
                                 cod_cli,
                                 fec_ped,
                                 inf_ped,
                                 com_ped,
                                 cre_ped)
              VALUES ('$datos[0]',
                      '$datos[1]',
                      '$datos[2]',
                      '$datos[3]',
                      'A',
                      '$datos[4]',
                      '$datos[5]',
                      'Pendiente',
                      '$datos[6]',
                      '$cre_ped')";
        $result = mysqli_query($conexion,$sql);
        if($result){
          $_SESSION['error']= 1;
            return 1;
        }
        if(!$result){
          echo "<script>console.log('$sql')</script>";
            return 0;
        }
    }

    public function ObtenerDatosPed($idped){
    $conexion = Conectar::conexion();
    $sql="SELECT cod_ped,cpo_ped,cpa_ped,cmo_ped,cal_ped,fec_ped,inf_ped,com_ped FROM pedidos WHERE cod_ped ='$idped'";
    $result=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($result);
    $datos=array(
        'cod_ped' => $ver[0],
        'cpo_ped' => $ver[1],
        'cpa_ped' => $ver[2],
        'cmo_ped' => $ver[3],
        'cal_ped' => $ver[4],
        'fec_ped' => $ver[5],
        'inf_ped' => $ver[6],
        'com_ped' => $ver[7]
    );
    return $datos;
  }

  public function actualizarPed($datos){
    $conexion = Conectar::conexion();
    $upd_ped = date("Y-m-d h:i:s");  
   if(isset($_SESSION['nom_cli'])){
    $sql="UPDATE pedidos 
    SET cpo_ped='$datos[1]',
    cpa_ped='$datos[2]',
    cmo_ped='$datos[3]',
    cal_ped='$datos[4]',
    fec_ped='$datos[5]',
    inf_ped='$datos[6]',
    com_ped='$datos[7]',
    upd_ped='$upd_ped' 
    WHERE cod_ped='$datos[0]'";
   }
   if(isset($_SESSION['nom_usu'])){
    $sql="UPDATE pedidos 
    SET cpo_ped='$datos[1]',
    cpa_ped='$datos[2]',
    cmo_ped='$datos[3]',
    cal_ped='$datos[4]',
    fec_ped='$datos[5]',
    inf_ped='$datos[6]',
    com_ped='$datos[8]',
    cod_usu= '$datos[7]',
    upd_ped='$upd_ped' 
    WHERE cod_ped='$datos[0]'";
   }
  return mysqli_query($conexion,$sql);
  }

  public function restaurar($idped){
    $conexion = Conectar::conexion();
    $res_ped = date("Y-m-d h:i:s");
    $sql="UPDATE pedidos SET res_ped ='$res_ped',est_ped='A' WHERE cod_ped='$idped'";
    $d=mysqli_query($conexion,$sql);
    if($d){
      return 1;
    } else{
      // echo "<script>alert('$sql')</script>";
      return 0;
    }
  }

  public function papelera($idped){
    $conexion = Conectar::conexion();
    $del_ped = date("Y-m-d h:i:s");
    $sql="UPDATE pedidos SET del_ped ='$del_ped', est_ped='B' WHERE cod_ped='$idped'";
    $d=mysqli_query($conexion,$sql);
    if($d){
      return 1;
    } else{
      // echo "<script>alert('$sql')</script>";
      return 0;
    }
  }
  public function eliminarPed($idped){
    $conexion = Conectar::conexion();
    $sql="DELETE FROM pedidos WHERE cod_ped='$idped'";
    return mysqli_query($conexion,$sql);
  
  }
  public function listarPdf($idped){
    $conexion = Conectar::conexion();
    $sql ="SELECT 
    c.nom_cli,
    p.cpo_ped,
    p.cpa_ped,
    p.cmo_ped,
    p.cal_ped,
    p.fec_ped,
    p.inf_ped
    FROM pedidos as p
    INNER JOIN cliente as c
    ON p.cod_cli=c.cod_cli WHERE p.cod_ped = '$idped'";
    return mysqli_query($conexion,$sql);
  }
  
  public function filtrar($datos){
    $conexion = Conectar::conexion();
  if($datos[0] == 1){
    $filtro1=($datos[2]!="")?"and p.cpo_ped like '%$datos[2]%'":"";
    $filtro2=($datos[3]!="")?"and p.cpa_ped like '%$datos[3]%'":"";
    $filtro3=($datos[4]!="")?"and p.cmo_ped like '%$datos[4]%'":"";
    $filtro4=($datos[5]!="")?"and p.cal_ped like '%$datos[5]%'":"";
    $filtro5=($datos[6]!="")?"and p.fec_ped like '%$datos[6]%'":"";
    $filtro6=($datos[7]!="")?"and p.inf_ped like '%$datos[7]%'":"";
    $filtro7=($datos[1]!="")?"and c.nom_cli like '%$datos[1]%'":"";
    $sql= "SELECT p.cod_ped,
                c.nom_cli,
                p.cpo_ped,
                p.cpa_ped,
                p.cmo_ped,
                p.cal_ped,
                p.fec_ped,
                p.inf_ped
         FROM pedidos as p
         INNER JOIN cliente as c
         ON p.cod_cli = c.cod_cli WHERE 1=1 $filtro1 $filtro2 $filtro3 $filtro4 $filtro5 $filtro6 $filtro7
         AND p.est_ped='A' $filtro7";
          return mysqli_query($conexion,$sql);
  }
  if($datos[0] == 2){
    $filtro2=($datos[1]!="")?"and p.cpo_ped like '%$datos[1]%'":"";
    $filtro3=($datos[2]!="")?"and p.cpa_ped like '%$datos[2]%'":"";
    $filtro4=($datos[3]!="")?"and p.cmo_ped like '%$datos[3]%'":"";
    $filtro5=($datos[4]!="")?"and p.cal_ped like '%$datos[4]%'":"";
    $filtro6=($datos[5]!="")?"and p.fec_ped like '%$datos[5]%'":"";
    $filtro7=($datos[6]!="")?"and p.inf_ped like '%$datos[6]%'":"";
    $sql= "SELECT p.cod_ped,
    c.nom_cli,
    p.cpo_ped,
    p.cpa_ped,
    p.cmo_ped,
    p.cal_ped,
    p.fec_ped,
    p.inf_ped
    FROM pedidos as p
    INNER JOIN cliente as c
    ON p.cod_cli = c.cod_cli WHERE 1=1 $filtro2 $filtro3 $filtro4 $filtro5 $filtro6 $filtro7
    AND p.est_ped='A' AND p.cod_cli = '$datos[7]'";
    return mysqli_query($conexion,$sql);
  }
  }
}
?>