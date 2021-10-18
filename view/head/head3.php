<?php 

class estilos {
   public function encabezado(){
    echo "<meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <meta http-equiv='X-UA-Compatible' content='ie=edge'>
          <link rel='icon' href='../../logo/pollito.png'>
          <title>Pollos San Pedro</title>
          <link rel='stylesheet' href='../../librerias/flatly/bootstrap.min.css'>
          <link rel='stylesheet' href='../../librerias/datatable/datatables.min.css'>
          <link rel='stylesheet' href='../../librerias/datatable/datatables.css'>
          <link rel='stylesheet' href='../../librerias/fontawesome/css/all.css'>
          <link rel='stylesheet' href='../../librerias/select2/css/select2.css'>
          <link rel='stylesheet' href='../../librerias/jquery-ui-1.12.1/jquery-ui.theme.css'>
          <link rel='stylesheet' href='../../librerias/jquery-ui-1.12.1/jquery-ui.css'>
          <link rel='stylesheet' href='../../librerias/alertifyjs/css/alertify.css'>
          <link rel='stylesheet' href='../../librerias/alertifyjs/css/themes/default.css'>
          <link rel='stylesheet' href='../../librerias/animate/animate.min.css'>
          <link rel='stylesheet' href='../../librerias/wow/animate.css'>
          <link rel='stylesheet' href='../css/estilo.css'>
        ";
   }

   public function pie(){
    echo "
        <script src='../../librerias/bootstrap-4.4/jquery-3.4.1.min.js'></script>
        <script src='../../librerias/bootstrap-4.4/popper.min.js'></script>
        <script src='../../librerias/bootstrap-4.4/bootstrap.min.js'></script>
        <script src='../../librerias/jquery-3.4.1.min.js'></script>
        <script src='../../librerias/datatable/datatables.min.js'></script>
        <script src='../../librerias/datatable/datatables.js'></script>
        <script src='../../librerias/alertifyjs/alertify.js'></script>
        <script src='../../librerias/fontawesome/js/all.js'></script>
        <script src='../../librerias/select2/js/select2.js'></script>
        <script src='../../librerias/wow/wow.min.js'></script>
        <script src='../../librerias/sweetalert.min.js'></script>
        <script src='../../librerias/jquery-ui-1.12.1/jquery-ui.js'></script>
    ";
   }

}

?>