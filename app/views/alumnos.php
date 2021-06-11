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
    <?php if ($_SESSION["tipo"] == 1) { ?>
      <section id="centro">
        <div class="content-panel mt-4" id="panelDatos">
          <h4>
            <i class="fas fa-user-graduate"></i>
            <span> Alumnos </span>
            <button class="btn btn-dark btn-md ml-4" id="btnAgregar">
              <i class="fa fa-plus"></i>
              Agregar Alumno
            </button>
          </h4>
          <hr>
          <div id="contentTable">
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
                  <th scope="col">Corr</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Fecha de nacimiento</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Cinta</th>
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
              <h4>
                <i class="fas fa-user-graduate"></i>
                <span> Alumnos </span>
              </h4>
              <hr>
              <form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
                <input type="hidden" id="id_alumno" name="id_alumno" value="0" class="campo">
                <div class="form-group row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control campo" id="nombre" name="nombre" placeholder="Nombre" required autofocus>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control campo" id="apellido" name="apellido" placeholder="Apellido" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fechanac" class="col-sm-2 col-form-label">fecha de nacimiento</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control campo" id="fechanac" name="fechanac" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control campo" rows="3" id="email" name="email" required />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control campo" rows="3" id="telefono" name="telefono" required />
                  </div>
                </div>

                <div class="form-group row">
                  <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                  <div class="col-sm-10">
                    <select class="form-control campo" id="estado" name="estado" required>
                      <option value="activo" selected>Activo</option>
                      <option value="inactivo">Inactivo</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="id_cinta" class="col-sm-2 col-form-label">Cinta</label>
                  <div class="col-sm-10">
                    <select class="form-control campo" id="id_cinta" name="id_cinta" required>

                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="id_horario" class="col-sm-2 col-form-label">Horario</label>
                  <div class="col-sm-10">
                    <select class="form-control campo" id="id_horario" name="id_horario" required>

                    </select>
                  </div>
                </div>
                <button type="button" class="btn btn-default" id="btnCancelar">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    <?php } ?>
  </div>
  <?php include "app/views/secciones/scripts.php" ?>
  <script type="text/javascript" src="<?php echo URL; ?>public_html/js/alumnos.js"></script>
</body>

</html>