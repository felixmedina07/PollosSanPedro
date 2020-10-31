<?php
require_once "conexion.php";
class Despacho extends Conectar{
    public function agregarDespacho($datos){
        $conexion=Conectar::conexion();
        $cre_des=date("Y-m-d h:i:s");
        $idusuario=$_SESSION['idUsuario'];
        $fecha = date("Y-m-d");
        $sql2="SELECT cod_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro FROM productos WHERE est_pro='A' AND act_pro='A'";                
        $result2= mysqli_query($conexion,$sql2);
        $total=mysqli_fetch_array($result2);
        if($total['cpo_pro'] <= 0 || $total['cpa_pro'] <= 0 || $total['cal_pro'] <= 0 || $total['cmo_pro'] <= 0){ 
            return 3;
        }else{
            $sql="INSERT INTO despacho( pre_des,
                                    prd_des,
                                    cpo_des,
                                    cpa_des,
                                    cal_des,
                                    cmo_des,
                                    pok_des,
                                    pak_des,
                                    alk_des,
                                    mok_des,
                                    ppo_des,
                                    ppa_des,
                                    pal_des,
                                    pmo_des,
                                    est_des,
                                    cod_pro,
                                    cod_cli,
                                    cod_usu,
                                    fec_des,
                                    cre_des) 
                     VALUES('$datos[0]',
                            '$datos[1]',
                            '$datos[2]',
                            '$datos[3]',
                            '$datos[4]',
                            '$datos[5]',
                            '$datos[6]',
                            '$datos[7]',
                            '$datos[8]',
                            '$datos[9]',
                            '$datos[10]',
                            '$datos[11]',
                            '$datos[12]',
                            '$datos[13]',
                            '$datos[14]',
                            '$datos[15]',
                            '$datos[16]',
                            '$idusuario',
                            '$fecha',
                            '$cre_des')";
        $re = mysqli_query($conexion,$sql);
            if($re){
                $sql="UPDATE productos  SET cpo_pro ='$datos[17]',cpa_pro='$datos[18]',cal_pro='$datos[19]',cmo_pro='$datos[20]' WHERE est_pro='A' AND act_pro='A'";
                return mysqli_query($conexion,$sql);
                // echo "<script>alert('$sql')</script>";
                return 1;
            }
            if(!$re){
                // echo "<script>alert('$sql')</script>";
                return 0;
            }     
        }
    }


    public function papelera($iddespacho){
        $conexion = Conectar::conexion();
        $del_des = date("Y-m-d h:i:s");
        $sql="UPDATE despacho SET del_des ='$del_des', est_des='B' WHERE cod_des='$iddespacho'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
        }
    }

    public function restaurar($iddespacho){
        $conexion = Conectar::conexion();
        $res_des = date("Y-m-d h:i:s");
        $sql="UPDATE despacho SET res_des ='$res_des', est_des='A' WHERE cod_des='$iddespacho'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
        }
    }


    public function eliminarDespacho($iddespacho){
        $conexion = Conectar::conexion();
        $sql="DELETE FROM despacho WHERE cod_des='$iddespacho'";
        $d =mysqli_query($conexion,$sql);
        if($d){
            return 1;
        }else{
            return 0;
        }
    }

    public function actualizarSDespacho($datos){
        $conexion = Conectar::conexion();
        $idusuario=$_SESSION['idUsuario'];
        $upd_des=date("Y-m-d h:i:s");
        
            $sql="UPDATE productos SET cpo_pro ='$datos[17]',cpa_pro='$datos[18]',cal_pro='$datos[19]',cmo_pro='$datos[20]' WHERE est_pro='A' AND act_pro='A'";
             return mysqli_query($conexion,$sql);
       
    }

    public function actualizarRDespacho($datos){
        $conexion = Conectar::conexion();
        $idusuario=$_SESSION['idUsuario'];
        $upd_des=date("Y-m-d h:i:s");
             
                $sql="UPDATE productos SET cpo_pro ='$datos[17]',cpa_pro='$datos[18]',cal_pro='$datos[19]',cmo_pro='$datos[20]' WHERE est_pro='A' AND act_pro='A'";
                 return mysqli_query($conexion,$sql);
                return 1;
            
    }

    public function listar($iddespacho){
        $conexion = Conectar::conexion();
        $sql="SELECT d.cod_des,
             d.pre_des,
             d.prd_des,
             d.cpo_des,
             d.cpa_des,
             d.cal_des,
             d.cmo_des,
             d.pok_des,
             d.pak_des,
             d.alk_des,
             d.mok_des,
             d.ppo_des,
             d.ppa_des,
             d.pal_des,
             d.pmo_des,
             c.nom_cli,
             c.ape_cli,
             c.ced_cli,
             c.rif_cli,
             c.ads_cli,
             p.csp_pro,
             p.ces_pro,
             p.prp_pro
      FROM despacho AS d
      INNER JOIN cliente AS c
      ON d.cod_cli=c.cod_cli
      INNER JOIN productos AS p
      ON d.cod_pro=p.cod_pro
      AND d.cod_des='$iddespacho'";
      return mysqli_query($conexion,$sql);
    }


}
?>