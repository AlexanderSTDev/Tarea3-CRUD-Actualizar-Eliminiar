<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sitio Usuarios</title>
  <link rel="shortcut icon" type="image/png" href="Public/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="Public/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                </a>
                <p class="text-center">Ingrese sus datos</p>
                <form action="controllers/usuario.controller.php?op=login" method="post">
                  <?php
                  if (isset($_GET["op"])) {
                    switch ($_GET["op"]) {
                      case "1":
                  ?>
                        <div class="mb-3">
                          <div class="alert alert-danger">
                            Por favor ingrese sus datos
                          </div>
                        </div>

                      <?php
                        break;
                      case "2":
                      ?>
                        <div class="mb-3">
                          <div class="alert alert-danger">
                            El usuario no existe, por favor verifique sus datos
                          </div>
                        </div>
                      <?php
                        break;
                      case "3":
                      ?>
                        <div class="mb-3">
                          <div class="alert alert-danger">
                            Ocurrió un error al verificar el usuario, por favor intente mas tarde
                          </div>
                        </div>
                  <?php
                    }
                  }
                  ?>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" id="correo" name="correo" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" id="contrasenia" name="contrasenia" class="form-control">
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Ingresar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="Public/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="Public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>