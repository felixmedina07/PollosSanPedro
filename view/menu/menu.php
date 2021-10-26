<nav class="navbar navbar-expand-lg navbar-felix">
  <div class="container">
  <?php if(isset($_SESSION['nom_cli'])): ?>
 <a class="navbar-brand" href="principal_cliente.php"><img class="img-responsive ml-5" src="logo/pollito.png" alt="" width="110px" height="80px"></a>
 <?php endif;?>
 <?php if(isset($_SESSION['nom_usu'])): ?>
 <a class="navbar-brand" href="principal.php"><img class="img-responsive ml-5" src="logo/pollito.png" alt="" width="110px" height="80px"></a>
 <?php endif;?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['nom_cli'])): ?>
      <li class="nav-item">
        <a class="nav-link link-felix" href="perfil.php"><i class="fas fa-user"></i> Perfil</a>
      </li>
    <?php endif; ?> 
    <?php if(isset($_SESSION['nom_usu'])):?>   
     <?php if($_SESSION['rol']=='A' && $_SESSION['idUsuario']=1):?>
      <li class="nav-item">
        <a class="nav-link link-felix" href="usuarios.php"><i class="fas fa-user"></i> Usuarios</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle link-felix pt-2" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Administrador
        </a>
            <div class="dropdown-menu"  aria-labelledby="navbarDropdownLink">
              <a class="dropdown-item" href="proovedor.php"><i class="fas fa-industry"></i> Proovedor</a>
              <a class="dropdown-item" href="productos.php"><i class="fab fa-product-hunt"></i> Productos</a>
            </div>
      </li>
     <?php endif; ?> 
     <?php if($_SESSION['rol']=='A' || $_SESSION['rol']=='E' || $_SESSION['rol']=='S'): ?>  
     <li class="nav-item">
        <a class="nav-link link-felix" href="clientes.php"><i class="fas fa-users"></i> Clientes</a>
     </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle link-felix pt-2" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-money-check-alt"></i> Bancos
        </a>
            <div class="dropdown-menu"  aria-labelledby="navbarDropdownLink">
              <a class="dropdown-item " href="bn-casa.php"><i class="fas fa-university"></i>Bancos Empresa</a>
              <a class="dropdown-item " href="bn-clientes.php"><i class="fas fa-university"></i> Bancos Clientes</a>
            </div>
      </li>
      <?php endif ?>
     <?php if($_SESSION['rol']=='E' || $_SESSION['rol']=='A' ||  $_SESSION['rol']=='S'): ?> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle link-felix" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-chart-bar"></i> Despachos
        </a>
            <div class="dropdown-menu"  aria-labelledby="navbarDropdownLink">
              <?php if($_SESSION['rol']=='E' || $_SESSION['rol']=='A'){?> 
                <a class="dropdown-item" href="despacho.php"><i class="fas fa-clipboard-list"></i> Facturacion</a>
                <a class="dropdown-item" href="cuentas.php"><i class="fas fa-search-dollar"></i> Cuentas</a>
              <?php }else if( $_SESSION['rol']=='S'){ ?>
                <a class="dropdown-item" href="cuentas.php"><i class="fas fa-search-dollar"></i> Cuentas</a>
              <?php } ?>
            </div>
      </li>
      <?php endif;?>
      <?php if($_SESSION['rol']=='E' || $_SESSION['rol']=='A' ||  $_SESSION['rol']=='S'): ?> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle link-felix" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-plus-circle"></i> Mas
        </a>
            <div class="dropdown-menu"  aria-labelledby="navbarDropdownLink">
                <a class="dropdown-item" href="menu_nomina.php"><i class="fas fa-clipboard-list"></i> Otras Opciones</a>
                <?php  if($_SESSION['rol']=='A' && $_SESSION['idUsuario']==1): ?>
                <a class="dropdown-item" href="papelera.php"><i class="far fa-trash-alt"></i> Papelera</a>
                <?php endif;?>
            </div>
      </li>
      <?php endif;?>
    <?php endif;?>  
    <li class="nav-item dropdown">
          <button class="btn btn-menu  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if(isset($_SESSION['nom_usu'])): ?>
              <i class="far fa-address-card bg-red"></i> Usuario <?php echo $_SESSION['nom_usu'];?>
            <?php endif; ?>
            <?php if(isset($_SESSION['nom_cli'])): ?>
              <i class="far fa-address-card bg-red"></i> Usuario <?php echo $_SESSION['nom_cli'];?>
            <?php endif; ?>  
          </button>
            <div class="dropdown-menu bg-fe" aria-labelledby="navbarDropdownLink">
            <?php if(isset($_SESSION['nom_usu'])): ?>
              <a class="dropdown-item bg-f" href="backend/controllers/login/salir.php"><i class="fas fa-power-off"></i> Salir</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['nom_cli'])): ?>
              <a class="dropdown-item bg-f" href="backend/controllers/login/salirCliente.php"><i class="fas fa-power-off"></i> Salir</a>
            <?php endif; ?> 
            </div>
      </li>
    </ul>
  </div>
  </div>
</nav>