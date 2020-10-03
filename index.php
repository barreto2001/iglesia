<?php 
require_once('controllers/verification/deleteMisa.php');
session_start();
session_destroy();


	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IGLESIA</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/icon.png"/>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/estilos.css" rel="stylesheet" />
  </head>
  <body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
      <a class="navbar-brand" href="#">Misa.com</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent-4"
        aria-controls="navbarSupportedContent-4"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="aclogin" href="#">
              <i class="fas fa-user"></i> Ingresar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="acregistro" href="#">
              <i class="fas fa-user-plus"></i> Registrarme</a
            >
          </li>
        </ul>
      </div>
    </nav>
    <!--/.Navbar -->

    <section id="login">
      <div id="contenedor">
        <!-- Material form login -->
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4">
            <strong>Ingresar</strong>
          </h5>

          <!--Card content-->
          <div class="card-body px-lg-5 pt-0">
            <!-- Form -->
            <form
              class="text-center"
              style="color: #757575"
              action="controllers/session/login.php"
              method="POST"
            >
              <!-- Email -->
              <div class="md-form">
                <input
                  type="email"
                  id="materialLoginFormEmail"
                  name="email"
                  class="form-control"
                />
                <label for="materialLoginFormEmail">Correo</label>
              </div>

              <!-- Password -->
              <div class="md-form">
                <input
                  type="password"
                  id="materialLoginFormPassword"
                  name="pass"
                  class="form-control"
                />
                <label for="materialLoginFormPassword">Contraseña</label>
              </div>

              <!-- Sign in button -->
              <button
                class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                type="submit"
              >
                Ingresar
              </button>

              <!-- Register -->
            </form>
            <!-- Form -->
          </div>
        </div>
      </div>
      <!-- Material form login -->
    </section>

    <section id="registro">
      <div class="container">
        <!-- Material form register -->
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4">
            <strong>Registro</strong>
          </h5>

          <!--Card content-->
          <div class="card-body px-lg-5 pt-0">
            <!-- Form -->
            <form
              class="text-center"
              style="color: #757575"
              action="controllers/create/registro.php"
              method="POST"
            >
              <div class="md-form">
                <input
                  type="text"
                  id="materialRegisterFormFirstName"
                  name="name"
                  class="form-control"
                  required=""
                />
                <label for="materialRegisterFormFirstName">Nombres</label>
              </div>

              <div class="md-form">
                <select
                  class="browser-default custom-select"
                  name="type"
                  required
                >
                  <option value="" disabled selected>Tipo Documento</option>
                  <option value="CC">Cedula de Ciudadania</option>
                  <option value="CE">Cedula de Extranjeria</option>
                </select>
              </div>

              <div class="md-form">
                <input
                  type="number"
                  id="materialRegisterFormLastName"
                  name="documento"
                  class="form-control"
                  required
                />
                <label for="materialRegisterFormLastName">Documento</label>
              </div>

              <!-- Phone number -->
              <div class="md-form">
                <input
                  type="number"
                  id="materialRegisterFormPhone"
                  name="cel"
                  class="form-control"
                  aria-describedby="materialRegisterFormPhoneHelpBlock"
                  required
                />
                <label for="materialRegisterFormPhone">Numero de celular</label>
              </div>

              <!-- E-mail -->
              <div class="md-form">
                <input
                  type="email"
                  id="materialRegisterFormEmail"
                  name="email"
                  class="form-control"
                  required
                />
                <label for="materialRegisterFormEmail"
                  >Correo electronico</label
                >
              </div>

              <div class="md-form">
                <input
                  type="text"
                  id="materialRegisterFormEmail"
                  name="address"
                  class="form-control"
                  required
                />
                <label for="materialRegisterFormEmail">Direccion</label>
              </div>

              <!-- Password -->
              <div class="md-form">
                <input
                  type="password"
                  id="materialRegisterFormPassword"
                  class="form-control"
                  name="pass"
                  aria-describedby="materialRegisterFormPasswordHelpBlock"
                  required
                />
                <label for="materialRegisterFormPassword">Contraseña</label>
              </div>

              <!-- Sign up button -->
              <button
                class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                type="submit"
                style="width: 30%; margin-left: 350px"
              >
                Registrate
              </button>
            </form>
            <!-- Form -->
          </div>
        </div>
        <!-- Material form register -->
      </div>
    </section>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
    <script src="js/main.js"></script>
    <!-- SCRIPTS -->

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/js/mdb.min.js"></script>
  </body>
</html>
