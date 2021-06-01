<!DOCTYPE html>
<html>

<head>
  <?php include "app/views/secciones/css.php" ?>
</head>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle">
      <i class="fas fa-bars" id="header-toggle"></i>
    </div>
    <div>
      <?php echo $_SESSION["nuser"]; ?>
    </div>
  </header>
  <?php include_once "app/views/secciones/sidenav.php" ?>
  <div class="container pt-2">
    <section id="centro">
      <div class="content-panel mt-4" id="panelDatos">
        <h4>
          Participantes de Torneos
        </h4>
        <div id="contentTable" class="pt-1">
          <div class="row mb-1">
            <div class="input-group col-md-4">
              <input class="form-control py-2" type="search" placeholder="Buscar" id="txtSearch">
              <span class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </div>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Torneo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Direccion</th>
                <th scope="col">Pais</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <div class="row">
            <div class="col-md-12">
              <nav aria-label="Page navigation example" class="float-right">
                <ul class="pagination">

                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <div class="content-panel m-4 d-none" id="panelFormulario">
        <div class="row">
          <div class="col-md-10 mx-auto">

            <h4 id="torneoNombre">
              Torneo
            </h4>

            <hr>
            <form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
              <input type="hidden" id="id_participante" name="id_participante" value="0" class="campo">

              <div id="contentTable2" class="pt-1">
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Corr</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Email</th>
                      <th scope="col">Cinta</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>

              <button type="button" class="btn btn-default" id="btnCancelar">Atras</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include "app/views/secciones/scripts.php" ?>
  <script type="text/javascript" src="<?php echo URL; ?>public_html/js/participantes.js"></script>
</body>


</html>