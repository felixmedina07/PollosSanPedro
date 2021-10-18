<?php
require_once "conexion.php";
class Cuadre extends Conectar{
    
    public function agregaCuadres($datos){
      $conexion = Conectar::conexion();
      $cre_cua=date("Y-m-d h:i:s");
      $idusuario=$_SESSION['idUsuario'];
      $sql="SELECT cod_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro FROM productos WHERE est_pro='A' AND act_pro='A'";                
      $result= mysqli_query($conexion,$sql);
      $total=mysqli_fetch_array($result);  
      if($total['cpo_pro'] <= 0 || $total['cpa_pro'] <= 0 || $total['cal_pro'] <= 0 || $total['cmo_pro'] <= 0){
        return 3;
    }else{
        $sql="INSERT INTO cuadres(cpo_cua,
                                cpa_cua,
                                cal_cua,
                                cmo_cua,
                                pre_cua,
                                est_cua,
                                cod_cli,
                                cod_des,
                                cod_pro,
                                cod_usu,
                                cre_cua) 
            VALUES ('$datos[0]',
                    '$datos[1]',
                    '$datos[2]',
                    '$datos[3]',
                    '$datos[4]',
                    'A',
                    '$datos[5]',
                    '$datos[6]',
                    '$datos[7]',
                    '$idusuario',
                    '$cre_cua') ";
      $re=mysqli_query($conexion,$sql);
      if($re){
          $sql="UPDATE productos SET cpo_pro='$datos[8]', cpa_pro='$datos[9]',cal_pro='$datos[10]',cmo_pro='$datos[11]' WHERE est_pro='A' AND act_pro='A'";
          $re2 = mysqli_query($conexion,$sql);
          }if($re2){
           $sql="UPDATE despacho SET est_des='B' WHERE cod_des='$datos[6]'";
           return mysqli_query($conexion,$sql);
           return 1;
          }
          if(!$re2){
              return 0;
          }
    }

    }

    public function papelera($idcuadre){
      $conexion=Conectar::conexion();
        $del_cua = date("Y-m-d h:i:s");
        $sql="UPDATE cuadres SET del_cua ='$del_cua', est_cua='B' WHERE cod_cua='$idcuadre'";
        $d=mysqli_query($conexion,$sql);
        if($d){
            return 1;
        } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
        }
    }

    public function listar($idcuadre){
        $conexion = Conectar::conexion();
        $sql="SELECT cl.nom_cli,
                    cl.ape_cli,
                    cl.ced_cli,
                    cl.rif_cli,
                    cl.ads_cli,
                    c.cpo_cua,
                    c.cpa_cua,
                    c.cal_cua,
                    c.cmo_cua,
                    c.pre_cua
        FROM cuadres AS c
        INNER JOIN cliente AS cl
        ON c.cod_cli=cl.cod_cli
        AND cod_cua='$idcuadre'";
        return  mysqli_query($conexion,$sql);
       }
       public function listarCliente($idcliente){
        $conexion = Conectar::conexion();
        $sql="SELECT nom_cli,ape_cli,ced_cli,rif_cli,ads_cli FROM cliente WHERE cod_cli='$idcliente'";
        return  mysqli_query($conexion,$sql);
       }
    public function restaurar($idcuadre){
      $conexion=Conectar::conexion();
      $res_cua = date("Y-m-d h:i:s");
      $sql="UPDATE cuadres SET res_cua ='$res_cua', est_cua='A' WHERE cod_cua='$idcuadre'";
      $d=mysqli_query($conexion,$sql);
      if($d){
          return 1;
      } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
      }
    }

    public function obtenerDatoDespacho($iddespacho){
        $conexion=Conectar::conexion();
        $sql=" SELECT cpo_des,pak_des,alk_des,mok_des,pre_des FROM despacho WHERE cod_des ='$iddespacho' AND est_des='A' ";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos =array(
            'cpo_des' => $ver[0],
            'pak_des' => $ver[1],
            'alk_des' => $ver[2],
            'mok_des' => $ver[3],
            'pre_des' => $ver[4]
        );
        return $datos;
    }

    public function eliminarCuadres($idcuadre){
      $conexion = Conectar::conexion();
        $sql="DELETE FROM cuadres WHERE cod_cua='$idcuadre'";
        $d = mysqli_query($conexion,$sql);
        if($d){
          return 1;
        }else{
            return 0;
        }
    }

  
}

?>