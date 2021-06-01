<!DOCTYPE html>
<html>

<head>
  <?php include "app/views/secciones/css.php" ?>
  <script>

  </script>
</head>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle">
      <i class="fas fa-bars" id="header-toggle"></i>
    </div>
    <div>
      <?php echo $_SESSION["nuser"]; ?>
    </div>

    <style>
      #calendar {
        width: 600px;
        margin: 0 20px 20px 0;
      }
    </style>
  </header>
  <?php include_once "app/views/secciones/sidenav.php" ?>
  <div class="container pt-2">
    <section id="centro">
      <div class="content-panel mt-4" id="panelDatos">
        <h4>
          Asistencia de alumnos
        </h4>
        <div id="contentTable" class="pt-1">

          <div id="calendar"></div>

        </div>
      </div>

      <div class="content-panel m-4 d-none" id="panelFormulario">
        <div class="row">
          <div class="col-md-10 mx-auto">

            <h4>
              Asistencia
            </h4>

            <hr>
            <form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
              <input type="hidden" id="id_asistencia" name="id_asistencia" value="0" class="campo">

              <div id="contentTable2" class="pt-1">
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Corr</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Cinta</th>
                      <th scope="col">Hora</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>

              <button type="button" class="btn btn-default" id="btnCancelar">Regresar</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>



  <?php include "app/views/secciones/scripts.php" ?>
  <script type="text/javascript" src="<?php echo URL; ?>public_html/js/asistencia.js"></script>
</body>

</html>