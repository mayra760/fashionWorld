<div class="perfil">
<?php
echo Usuarios::perfilUsuario($_SESSION['id']);
?>

<button id="holi" type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    . . .
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="conBaBus.php?eliCuenta=true&seccion=ctroUser">elimina tu cuenta</a></li>
  </ul>

</div>

