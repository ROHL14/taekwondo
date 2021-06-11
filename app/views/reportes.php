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
    <div id="buttonSelection">
      <button class="btn btn-outline-dark" id="buttonAlumno">Alumnos</button>
      <button class="btn btn-outline-dark" id="buttonTorneo">Torneos</button>
      <button class="btn btn-outline-dark" id="buttonParticipante">Participantes en torneos</button>
      <button class="btn btn-outline-dark" id="buttonEquipo">Equipo</button>
      <button class="btn btn-outline-dark" id="buttonPrestamo">Prestamos</button>
      <button class="btn btn-outline-dark" id="buttonAsistencia">Asistencia</button>
    </div>

    <section id="centroAlumno">
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_cinta">Cinta</label>
              <select class="form-control ml-2" id="id_cinta" name="id_cinta" required>

              </select>

              <button class="btn btn-dark ml-2" id="btnViewReportAlumno"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereporteAlumno"></iframe>
      </div>
    </section>

    <section id="centroTorneo" class="d-none">
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_pais">Pais</label>
              <select class="form-control ml-2" id="id_pais" name="id_pais" required>

              </select>

              <button class="btn btn-dark ml-2" id="btnViewReportTorneo"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereporteTorneo"></iframe>
      </div>
    </section>

    <section id="centroParticipante" class="d-none">
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_torneo">Torneo</label>
              <select class="form-control ml-2" id="id_torneo" name="id_torneo" required>

              </select>

              <button class="btn btn-dark ml-2" id="btnViewReportParticipante"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereporteParticipante"></iframe>
      </div>
    </section>

    <section id="centroEquipo" class="d-none">
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_categoria">Categoria</label>
              <select class="form-control ml-2" id="id_categoria" name="id_categoria" required>

              </select>

              <button class="btn btn-dark ml-2" id="btnViewReportEquipo"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereporteEquipo"></iframe>
      </div>
    </section>

    <section id="centroPrestamo" class="d-none">
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_equipo">Equipo</label>
              <select class="form-control ml-2" id="id_equipo" name="id_equipo" required>

              </select>

              <label for="id_alumno" class="ml-4">Alumno</label>
              <select class="form-control ml-2" id="id_alumno" name="id_alumno" required>

              </select>

              <button class="btn btn-dark ml-2" id="btnViewReportPrestamo"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereportePrestamo"></iframe>
      </div>
    </section>

    <section id="centroAsistencia" class="d-none">
      <div class="content-panel mt-4">
        <div class="row mb-3 p3 m1">
          <div class="col-md-12">
            <div class="form-inline">
              <label for="id_horario">Horario</label>
              <select class="form-control ml-2" id="id_horario" name="id_horario" required>

              </select>

              <label for="id_alumno2" class="ml-4">Alumno</label>
              <select class="form-control ml-2" id="id_alumno2" name="id_alumno2" required>

              </select>

              <button class="btn btn-dark ml-2" id="btnViewReportAsistencia"><i class="fas fa-print"></i> Ver Reporte</button>
            </div>
          </div>
        </div>
        <iframe src="" width="100%" height="400" style="border:1px solid black;" id="framereporteAsistencia"></iframe>
      </div>
    </section>

  </div>
  <?php include "app/views/secciones/scripts.php" ?>
  <script type="text/javascript" src="<?php echo URL; ?>public_html/js/reportes.js"></script>
</body>

</html>