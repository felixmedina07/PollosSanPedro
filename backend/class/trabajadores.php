<?php
require_once "conexion.php";

class Trabajador extends Conectar{

 public function agregarTrab($datos){
    $_SESSION['error']= '';
    $conexion = Conectar::conexion();
    $idusuario=$_SESSION['idUsuario'];
    $cre_tra = date("Y-m-d h:i:s");
    $ced_tra = $datos[2];
    if($this->buscaTrab($ced_tra)){
      $_SESSION['error']= 0;
       return 3;
    }else{
       $sql="INSERT INTO trabajadores(nom_tra,
                                       ape_tra,
                                       ced_tra,
                                       ads_tra,
                                       cor_tra,
                                       tel_tra,
                                       est_tra,
                                       cod_usu,
                                       cre_tra)
               VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','A','$idusuario','$cre_tra')";
       $resultado= mysqli_query($conexion,$sql);
       if($resultado){
         $_SESSION['error']= 1;
         return 1;
       }
       if(!$resultado){
        $_SESSION['error']= 0;
       return 0;
       }
    }
 }
 
 public function buscaTrab($ced_tra){
   $conexion = Conectar::conexion();
   $sql="SELECT * FROM trabajadores WHERE ced_tra='$ced_tra'";
   $result= mysqli_query($conexion,$sql);
   if(mysqli_num_rows($result) > 0){
     return 1;
   }else{
       return 0;
   }
 }

 public function obtenerTrab($idtrab){
  $conexion = Conectar::conexion();
  $sql="SELECT cod_tra,nom_tra,ape_tra,ced_tra,ads_tra,cor_tra,tel_tra FROM trabajadores WHERE cod_tra ='$idtrab'";
  $result=mysqli_query($conexion,$sql);
  $ver=mysqli_fetch_row($result);
  $datos=array(
      'cod_tra' => $ver[0],
      'nom_tra' => $ver[1],
      'ape_tra' => $ver[2],
      'ced_tra' => $ver[3],
      'ads_tra' => $ver[4],
      'cor_tra' => $ver[5],
      'tel_tra' => $ver[6]
  );
  return $datos;
 }

 public function listar($idtrab){
  $conexion = Conectar::conexion();
  $sql="SELECT nom_tra,ape_tra,ced_tra,ads_tra,cor_tra,tel_tra FROM trabajadores WHERE cod_tra='$idtrab'";
  return  mysqli_query($conexion,$sql);
 }
 public function listarTodo(){
   $conexion = Conectar::conexion();
   $sql="SELECT cod_tra,nom_tra,ape_tra FROM trabajadores WHERE est_tra='A'";
   return mysqli_query($conexion,$sql);
 }

 public function listarbanco($idtrab){
  $conexion = Conectar::conexion();
  $sql="SELECT not_bnt,ncu_bnt,tpc_bnt,rcd_bnt,nom_bnt,cor_bnt,tti_bnt FROM bancos_trabajadores WHERE cod_tra='$idtrab'";
  return  mysqli_query($conexion,$sql);
 }

 public function actualizarTrab($datos){
  $conexion = Conectar::conexion();
  $upd_tra = date("Y-m-d h:i:s");
  $sql="UPDATE trabajadores SET nom_tra='$datos[1]',ape_tra='$datos[2]',ced_tra='$datos[3]',ads_tra='$datos[4]',cor_tra='$datos[5]',tel_tra='$datos[6]',upd_tra='$upd_tra' WHERE cod_tra='$datos[0]'";
  return mysqli_query($conexion,$sql);
 }

 public function eliminarTrab($idtrab){
  $conexion = Conectar::conexion();
  $sql="DELETE FROM trabajadores WHERE cod_tra='$idtrab'";
  return mysqli_query($conexion,$sql);

}

 public function papelera($idtrab){
  $conexion = Conectar::conexion();
  $del_tra = date("Y-m-d h:i:s");
  $sql="UPDATE trabajadores SET del_tra ='$del_tra', est_tra='B' WHERE cod_tra='$idtrab'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    // echo "<script>alert('$sql')</script>";
    return 0;
  }

}

public function restaurar($idtrab){
  $conexion = Conectar::conexion();
  $res_tra = date("Y-m-d h:i:s");
  $sql="UPDATE trabajadores SET res_tra ='$res_tra',est_tra='A' WHERE cod_tra='$idtrab'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    // echo "<script>alert('$sql')</script>";
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