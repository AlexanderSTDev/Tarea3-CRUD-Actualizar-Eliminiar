<?php
session_start();
if (!isset($_SESSION['UsuarioId']) and isset($_SESSION['Rol']) !="Administrador") {
  header('Location: ../login.php');
  exit();
}
?>
<!doctype html>
<html lang="es">
    <head>
    <?php require_once('html/head.php') ?>
    </head>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <?php require_once('html/menu.php') ?>
    <div class="body-wrapper">
      <?php require_once('html/header.php') ?>
      <div class="container-fluid">
       <iframe name="base" id="base" src="graficos.php" style="border: none;" width="100%" height="1000px" ></iframe>
       <?php require_once('html/footer.php') ?>
      </div>
    </div>
</div>
  <?php require_once('html/script.php') ?>

</body>

</html>