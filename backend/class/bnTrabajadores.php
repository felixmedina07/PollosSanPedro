<?php
require_once "conexion.php";

class BnTrabajador extends Conectar{

 public function agregarBnTrab($datos){
    $_SESSION['error']= '';
    $conexion = Conectar::conexion();
    $idusuario=$_SESSION['idUsuario'];
    $cre_bnt = date("Y-m-d h:i:s");
    $num = $datos[1];
    if($this->buscaBnTrab($num)){
       return 3;
    }else{
       $sql="INSERT INTO bancos_trabajadores(not_bnt,
                                       ncu_bnt,
                                       tpc_bnt,
                                       rcd_bnt,
                                       nom_bnt,
                                       cor_bnt,
                                       tti_bnt,
                                       est_bnt,
                                       cod_tra,
                                       cod_usu,
                                       cre_bnt)
               VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','A','$datos[7]','$idusuario','$cre_bnt')";
       $resultado= mysqli_query($conexion,$sql);
       if($resultado){
         $_SESSION['error']= 1;
         return 1;
       }
       if(!$resultado){
       return 0;
       }
    }
 }
 
 public function buscaBnTrab($num){
   $conexion = Conectar::conexion();
   $sql="SELECT * FROM bancos_trabajadores WHERE ncu_bnt='$num'";
   $result= mysqli_query($conexion,$sql);
   if(mysqli_num_rows($result) > 0){
     return 1;
   }else{
       return 0;
   }
 }

 public function obtenerBnTrab($idbnt){
  $conexion = Conectar::conexion();
  $sql="SELECT cod_bnt,not_bnt,ncu_bnt,tpc_bnt,rcd_bnt,nom_bnt,cor_bnt,tti_bnt,cod_tra FROM bancos_trabajadores WHERE cod_bnt ='$idbnt'";
  $result=mysqli_query($conexion,$sql);
  $ver=mysqli_fetch_row($result);
  $datos=array(
    'cod_bnt' => $ver[0],
    'cod_tra' => $ver[8],
    'not_bnt' => $ver[1],
    'ncu_bnt' => $ver[2],
    'tpc_bnt' => $ver[3],
    'rcd_bnt' => $ver[4],
    'nom_bnt' => $ver[5],
    'cor_bnt' => $ver[6],
    'tti_bnt' => $ver[7]
);
  return $datos;
 }

 public function actualizarBnTrab($datos){
  $conexion = Conectar::conexion();
  $upd_bnt = date("Y-m-d h:i:s");
  $sql="UPDATE bancos_trabajadores SET not_bnt='$datos[2]',
                                      ncu_bnt='$datos[3]',
                                      tpc_bnt='$datos[4]',
                                      rcd_bnt='$datos[5]',
                                      nom_bnt='$datos[6]',
                                      cor_bnt='$datos[7]',
                                      tti_bnt='$datos[8]',
                                      cod_tra='$datos[1]',upd_bnt='$upd_bnt' WHERE cod_bnt = '$datos[0]'";
  $result = mysqli_query($conexion,$sql);
  if($result){
    return 1;
  }
  if(!$result){
    return 0;
  }
 }

 public function eliminarbnTrab($idbnt){
  $conexion = Conectar::conexion();
  $sql = "DELETE FROM bancos_trabajadores WHERE cod_bnt='$idbnt'";
  return mysqli_query($conexion,$sql);

}

 public function papelera($idbnt){
  $conexion = Conectar::conexion();
  $del_bnt= date("Y-m-d h:i:s");
  $sql="UPDATE bancos_trabajadores SET del_bnt ='$del_bnt', est_bnt='B' WHERE cod_bnt='$idbnt'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    // echo "<script>alert('$sql')</script>";
    return 0;
  }

}

public function restaurar($idbnt){
  $conexion = Conectar::conexion();
  $res_bnt = date("Y-m-d h:i:s");
  $sql="UPDATE bancos_trabajadores SET res_bnt ='$res_bnt',est_bnt='A' WHERE cod_bnt='$idbnt'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    //echo "<script>alert('$sql')</script>";
    return 0;
  }
}

public function filtrar($datos){
  $conexion = Conectar::conexion();
  $filtro1=($datos[0]!="")?"and t.nom_tra like '%$datos[0]%'":"";
  $filtro2=($datos[1]!="")?"and b.not_bnt like '%$datos[1]%'":"";
  $filtro3=($datos[2]!="")?"and b.ncu_bnt like '%$datos[2]%'":"";
  $filtro4=($datos[3]!="")?"and b.tpc_bnt like '%$datos[3]%'":"";
  $filtro5=($datos[4]!="")?"and b.rcd_bnt like '%$datos[4]%'":"";
  $filtro6=($datos[5]!="")?"and b.nom_bnt like '%$datos[5]%'":"";
  $filtro7=($datos[6]!="")?"and b.cor_bnt like '%$datos[6]%'":"";
  $filtro8=($datos[7]!="")?"and b.tti_bnt like '%$datos[7]%'":"";
  $filtro9=($datos[8]!="")?"and t.ape_tra like '%$datos[8]%'":"";
  $sql= "SELECT t.nom_tra,
                b.not_bnt,
                b.ncu_bnt,
                b.tpc_bnt,
                b.rcd_bnt,
                b.nom_bnt,
                b.cor_bnt,
                b.tti_bnt
         FROM bancos_trabajadores as b
         INNER JOIN trabajadores as t
         ON b.cod_tra = t.cod_tra WHERE 1=1 $filtro1 $filtro9 $filtro2 $filtro3 $filtro4 $filtro5 $filtro6 $filtro7 $filtro8
         AND b.est_bnt='A'";
  return mysqli_query($conexion,$sql);
}

}

?>