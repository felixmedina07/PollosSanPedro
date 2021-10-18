<?php 
require_once("conexion.php");

 class Nomina extends Conectar{
    public function agregarNomina($datos){
        $_SESSION['error']= '';
        $conexion = Conectar::conexion();
        $cre_nom = date("Y-m-d h:i:s");
        $idusuario = $_SESSION['idUsuario'];
        $sql="INSERT INTO nomina(nrf_nom,
                                 cnp_nom,
                                 fcu_nom,
                                 est_nom,
                                 cod_bnc,
                                 cod_bnt,
                                 cod_tra,
                                 cod_usu,
                                 cre_nom)
              VALUES ('$datos[0]',
                      '$datos[1]',
                      '$datos[2]',
                      'A',
                      '$datos[3]',
                      '$datos[4]',
                      '$datos[5]',
                      '$idusuario',
                      '$cre_nom')";
        $result = mysqli_query($conexion,$sql);
        if($result){
          $_SESSION['error']= 1;
            return 1;
        }
        if(!$result){
            return 0;
        }
    }

    public function obtenerNomina($idnomina){
        $conexion = Conectar::conexion();
        $sql="SELECT cod_nom,nrf_nom,cnp_nom,fcu_nom,cod_bnc,cod_bnt,cod_tra FROM nomina WHERE cod_nom ='$idnomina'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos=array(
            'cod_nom' => $ver[0],
            'cod_tra' => $ver[6],
            'cod_bnc' => $ver[4],
            'cod_bnt' => $ver[5],
            'nrf_nom' => $ver[1],
            'cnp_nom' => $ver[2],
            'fcu_nom' => $ver[3]
        );
        return $datos;
    }

    public function actualizarNomina($datos){
        $conexion = Conectar::conexion();
        $upd_nom = date("Y-m-d h:i:s");
        $sql="UPDATE nomina SET nrf_nom='$datos[0]',
                                cnp_nom='$datos[1]',
                                fcu_nom='$datos[2]',
                                cod_bnc='$datos[3]',
                                cod_bnt='$datos[4]',
                                cod_tra='$datos[5]',
                                upd_nom='$upd_nom'
              WHERE cod_nom = '$datos[6]'";
      $result = mysqli_query($conexion,$sql);
      if($result){
        return 1;
      }
      if(!$result){
        return 0;
      }
    }

    public function papelera($idnomina){
        $conexion = Conectar::conexion();
        $del_nom = date("Y-m-d h:i:s");
        $sql="UPDATE nomina  SET del_nom ='$del_nom', est_nom='B' WHERE cod_nom='$idnomina'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          return 0;
        }
      }
      public function eliminarNomina($idnomina){
          $conexion = Conectar::conexion();
          $sql = "DELETE FROM nomina WHERE cod_nom='$idnomina'";
          return mysqli_query($conexion,$sql);
      }
      public function restaurar($idnomina){
        $conexion = Conectar::conexion();
        $res_nom = date("Y-m-d h:i:s");
        $sql="UPDATE nomina SET res_nom ='$res_nom', est_nom='A' WHERE cod_nom='$idnomina'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          return 0;
        }
      }

      public function filtrar($datos){
        $conexion = Conectar::conexion();
        $filtro1=($datos[0]!="")?"and t.nom_tra like '%$datos[0]%'":"";
        $filtro2=($datos[1]!="")?"and t.ape_tra like '%$datos[1]%'":"";
        $filtro3=($datos[2]!="")?"and bc.nom_bnc like '%$datos[2]%'":"";
        $filtro4=($datos[3]!="")?"and bt.nom_bnt like '%$datos[3]%'":"";
        $filtro5=($datos[4]!="")?"and n.nrf_nom like '%$datos[4]%'":"";
        $filtro6=($datos[5]!="")?"and n.cnp_nom like '%$datos[5]%'":"";
        $filtro7=($datos[5]!="")?"and n.fcu_nom like '%$datos[5]%'":"";
        $sql= "SELECT n.nrf_nom,
                      n.cnp_nom,
                      n.fcu_nom,
                      t.nom_tra,
                      t.ape_tra,
                      bc.nom_bnc,
                      bt.nom_bnt,
                      n.cod_nom
              FROM nomina AS n
              INNER JOIN bancos_trabajadores AS bt
              ON n.cod_bnt=bt.cod_bnt
              INNER JOIN bancos_casa AS bc
              ON n.cod_bnc=bc.cod_bnc
              INNER JOIN trabajadores AS t
              ON n.cod_tra=t.cod_tra  where 1=1 $filtro1 $filtro2 $filtro3 $filtro4 $filtro5 $filtro6 $filtro7
              AND est_nom='A'";
        return mysqli_query($conexion,$sql);
      }
 }
?>