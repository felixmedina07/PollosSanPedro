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
         echo "<script>alert('$sql')</script>";
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
  $filtro1=($datos[0]!="")?"and nom_tra like '%$datos[0]%'":"";
  $filtro2=($datos[1]!="")?"and ape_tra like '%$datos[1]%'":"";
  $filtro3=($datos[2]!="")?"and ced_tra like '%$datos[2]%'":"";
  $filtro4=($datos[3]!="")?"and ads_tra like '%$datos[3]%'":"";
  $filtro5=($datos[4]!="")?"and cor_tra like '%$datos[4]%'":"";
  $filtro6=($datos[5]!="")?"and tel_tra like '%$datos[5]%'":"";
  $sql= "select nom_tra,ape_tra,ced_tra,ads_tra,cor_tra,tel_tra from trabajadores where 1=1 $filtro1 $filtro2 $filtro3 $filtro4 $filtro5 $filtro6 AND est_tra='A'";
  return mysqli_query($conexion,$sql);
}

}

?>