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
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_cinta">Cinta</label>
              <select class="form-control ml-2" id="id_cinta" name="id_cinta" required>

              </select>

              <button class="btn btn-primary ml-2" id="btnViewReport"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereporte"></iframe>
      </div>
    </section>

  </div>
  <?php include "app/views/secciones/scripts.php" ?>
  <script type="text/javascript" src="<?php echo URL; ?>public_html/js/reportes.js"></script>
</body>

</html>