<?php
require_once "conexion.php";
class Proovedor extends Conectar{
    public function agregarProovedor($datos){
       $conexion= Conectar::conexion();
       $idusuario=$_SESSION['idUsuario'];
       $cre_edo=date("Y-m-d h:i:s");
       $rif_edo= $datos[1];
       $cor_edo= $datos[2];
       if($this->buscarProovedor($rif_edo,$cor_edo) == 1){
          return 3;
       }else{
        $sql="INSERT INTO proovedor 
                         (nom_edo,
                          rif_edo,
                          cor_edo,
                          dir_edo,
                          est_edo,
                          cod_usu,
                          cre_edo) 
             VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','A','$idusuario','$cre_edo');";
            $d= mysqli_query($conexion,$sql);
            if($d){
            return 1;
            }
            if(!$d){
            return 0;
            }   
       }
         
    }
    

    public function buscarProovedor($rif, $correo){
      $conexion = Conectar::conexion();
      $sql="SELECT * FROM proovedor WHERE rif_edo='$rif' OR cor_edo='$correo'";
      $result=mysqli_query($conexion,$sql);
      if(mysqli_num_rows($result) > 0){
        return 1;
      }else{
          return 0;
      }
    }

    public function ObtenerProovedor($idproovedor){
        $conexion= Conectar::conexion();
        $sql="SELECT cod_edo,nom_edo,rif_edo,cor_edo,dir_edo FROM proovedor WHERE cod_edo='$idproovedor'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);

        $datos=array(
            'cod_edo' => $ver[0],
            'nom_edo' => $ver[1],
            'rif_edo' => $ver[2],
            'cor_edo' => $ver[3],
            'dir_edo' => $ver[4]
        );
        return $datos;
    }

    public function listar($idproovedor){
        $conexion = Conectar::conexion();
        $sql="SELECT nom_edo,rif_edo,cor_edo,dir_edo FROM proovedor WHERE cod_edo='$idproovedor'";
        return  mysqli_query($conexion,$sql);
       }

    public function ActualizarProovedor($datos){
        $conexion= Conectar::conexion();
        $upd_edo= date("Y-m-d h:i:s");
        $sql="UPDATE proovedor SET nom_edo='$datos[1]',rif_edo='$datos[2]',cor_edo='$datos[3]',dir_edo='$datos[4]',upd_edo='$upd_edo' WHERE cod_edo='$datos[0]'";
        return mysqli_query($conexion,$sql);
    }

    public function EliminarProovedor($idproovedor){
        $conexion= Conectar::conexion();
        $sql="DELETE FROM proovedor WHERE cod_edo='$idproovedor'";
        return mysqli_query($conexion,$sql);
    }

    public function Papelera($idproovedor){
        $conexion= Conectar::conexion();
        $del_edo= date("Y-m-d h:i:s");
        $sql="UPDATE proovedor SET del_edo='$del_edo', est_edo='B' WHERE cod_edo='$idproovedor'";
        $d=mysqli_query($conexion,$sql);
        if($d){
            return 1;
        } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
        }
    }

    public function Restaurar($idproovedor){
        $conexion= Conectar::conexion();
        $res_edo= date("Y-m-d h:i:s");
        $sql="UPDATE proovedor SET res_edo='$res_edo', est_edo='A' WHERE cod_edo='$idproovedor'";
        $d=mysqli_query($conexion,$sql);
        if($d){
            return 1;
        } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
        }
    }
}

?>