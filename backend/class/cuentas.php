<?php 
 require_once "conexion.php";
 class Cuenta extends Conectar{
  
    public function agregarCuenta($datos){
      $conexion = Conectar::conexion();
      $cre_cue=date("Y-m-d h:i:s");
      $idusuario=$_SESSION['idUsuario'];
      $sql="INSERT INTO cuentas(nrf_cue,
                                cnt_cue,
                                cnp_cue,
                                fcu_cue,
                                ctc_cue,
                                est_cue,
                                cod_bnk,
                                cod_bnc,
                                cod_cli,
                                cod_des,
                                cod_usu,
                                cre_cue)
             VALUES ('$datos[0]',
                     '$datos[1]',
                     '$datos[2]',
                     '$datos[3]',
                     '$datos[4]',
                     'A',
                     '$datos[5]',
                     '$datos[6]',
                     '$datos[7]',
                     '$datos[8]',
                     '$idusuario',
                     '$cre_cue')";
         $d= mysqli_query($conexion,$sql);
         if($d){
             $sql="UPDATE despacho SET ctc_des='$datos[4]' WHERE cod_des='$datos[8]' AND est_des='A'";
             return mysqli_query($conexion,$sql);
             return 1;
         }else{
            //  echo "<script>alert('$sql')</script>";
             return 0;
         }            
    } 

    public function obtenerDatoDespacho($iddespacho){
        $conexion=Conectar::conexion();
        $sql=" SELECT pre_des FROM despacho WHERE cod_des ='$iddespacho' AND est_des='A' ";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos =array(
            'pre_des' => $ver[0]
        );
        return $datos;
    }

    public function obtenerEcuenta($idcuenta){
     $conexion=Conectar::conexion();
     $sql="SELECT cod_cue,
                  ctc_cue
            FROM cuentas 
            WHERE cod_cue='$idcuenta'";
      $result=mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result); 
      
      $datos= array(
          'cod_cue' => $ver[0],
          'ctc_cue' => $ver[1]     
      );
      return $datos;
    }


    public function actualizarCuenta($datos){
        $conexion=Conectar::conexion();
        $idusuario=$_SESSION['idUsuario'];
        $upd_cue=date("Y-m-d h:i:s");
        $sql="UPDATE cuentas 
              SET nrf_cue='$datos[0]',
                  cnt_cue='$datos[1]',
                  cnp_cue='$datos[2]',
                  fcu_cue='$datos[3]',
                  ctc_cue='$datos[4]',
                  cod_bnk='$datos[5]',
                  cod_bnc='$datos[6]',
                  cod_cli='$datos[7]',
                  cod_des='$datos[8]',
                  cod_usu='$idusuario',
                  upd_cue='$upd_cue'
              WHERE cod_cue='$datos[9]'";
        $re = mysqli_query($conexion,$sql);
        if($re){
            $sql="UPDATE despacho SET ctc_des='$datos[4]' WHERE cod_des='$datos[8]' AND est_des='A'";
            return mysqli_query($conexion,$sql);
            return 1;
        }else{
           //  echo "<script>alert('$sql')</script>";
            return 0;
        }         
    }

    public function papelera($idcuenta){
        $conexion=Conectar::conexion();
        $del_cue = date("Y-m-d h:i:s");
        $sql="UPDATE cuentas SET del_cue ='$del_cue', est_cue='B' WHERE cod_cue='$idcuenta'";
        $d=mysqli_query($conexion,$sql);
        if($d){
            return 1;
        } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
        }

    }

    public function restaurar($idcuenta){
        $conexion=Conectar::conexion();
        $res_cue = date("Y-m-d h:i:s");
        $sql="UPDATE cuentas SET res_cue ='$res_cue', est_cue='A' WHERE cod_cue='$idcuenta'";
        $d=mysqli_query($conexion,$sql);
        if($d){
            return 1;
        } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
        }

    }

    public function eliminarCuenta($idcuenta){
        $conexion = Conectar::conexion();
        $sql="DELETE FROM cuentas WHERE cod_cue='$idcuenta'";
        $d = mysqli_query($conexion,$sql);
        if($d){
          return 1;
        }else{
            return 0;
        }
    }

    public function listarcuenta($idcuenta){
        $conexion = Conectar::conexion();
        $sql="SELECT c.nrf_cue,
                     c.cnt_cue,
                     c.cnp_cue,
                     cl.nom_cli,
                     cl.ape_cli,
                     cl.ced_cli,
                     cl.rif_cli,
                     cl.ads_cli,
                     bc.nom_bnc,
                     bc.rcd_bnc,
                     bk.nom_bnk,
                     d.fec_des
              FROM cuentas AS c
              INNER JOIN bancos_cliente AS bk
              ON c.cod_bnk=bk.cod_bnk
              INNER JOIN bancos_casa AS bc
              ON c.cod_bnc=bc.cod_bnc
              INNER JOIN cliente AS cl
              ON c.cod_cli=cl.cod_cli 
              INNER JOIN despacho AS d
              ON c.cod_des=d.cod_des
              AND c.cod_cue='$idcuenta'";
        return mysqli_query($conexion,$sql);
    }
    
 }
?>