<nav class="navbar navbar-expand-lg navbar-felix">
  <div class="container">
  <a class="navbar-brand" href="principal.php"><img class="img-responsive ml-5" src="logo/pollito.png" alt="" width="110px" height="80px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <button class="btn btn-menu  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-address-card bg-red"></i> Usuario <?php echo $_SESSION['nom_cli'];?>
          </button>
            <div class="dropdown-menu bg-fe" aria-labelledby="navbarDropdownLink">
             <a class="dropdown-item bg-f" href="backend/controllers/login/salirCliente.php"><i class="fas fa-power-off"></i> Salir</a>
            </div>
      </li>
    </ul>
  </div>
  </div>
</nav>