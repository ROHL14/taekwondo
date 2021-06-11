<?php
include_once "app/models/reportes.php";
include_once "vendor/autoload.php";
class ReportesController extends Controller
{
  private $reporte;
  public function __construct($param)
  {
    $this->reporte = new Reportes();
    parent::__construct("reportes", $param, true);
  }

  public function getReporteAlumnos()
  {

    $resultado = $this->reporte->getReporteAlumnos($_GET);

    $htmlheader = "<h1>Taekwondo Koryo</h1>";
    $htmlheader .= "<h3>Listado general de alumnos</h3>";
    $html = "<table width='100%' border='1'><thead><tr>";
    $html .= "<th>Corr</th>";
    $html .= "<th>Nombre</th>";
    $html .= "<th>Apellido</th>";
    $html .= "<th>Cinta</th>";
    $html .= "<th>Horario</th>";
    $html .= "<th>Fecha de Nacimiento</th>";
    $html .= "<th>Email</th>";
    $html .= "<th>Telefono</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td  style='text-align: center;'>" . ($key + 1) . "</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['apellido']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['color']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['hora']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['fechanac']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['email']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['telefono']}</td>";
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    $mpdfConfig = array(
      'mode' => 'utf-8',
      'format' => 'Letter',
      'default_font_size' => 0,
      'default_font' => '',
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 10,
      'margin_footer' => 20,
      'margin_top' => 40,
      'orientation' => 'P'
    );
    $mpdf = new \Mpdf\Mpdf($mpdfConfig);
    $mpdf->SetHTMLHeader($htmlheader);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }

  public function getReporteTorneos()
  {

    $resultado = $this->reporte->getReporteTorneos($_GET);

    $htmlheader = "<h1>Taekwondo Koryo</h1>";
    $htmlheader .= "<h3>Listado general de alumnos</h3>";
    $html = "<table width='100%' border='1'><thead><tr>";
    $html .= "<th>Corr</th>";
    $html .= "<th>Nombre</th>";
    $html .= "<th>Fecha</th>";
    $html .= "<th>Estado</th>";
    $html .= "<th>Direccion</th>";
    $html .= "<th>Pais</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td  style='text-align: center;'>" . ($key + 1) . "</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre_torneo']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['fecha']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['estado_torneo']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['direccion']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['pais']}</td>";
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    $mpdfConfig = array(
      'mode' => 'utf-8',
      'format' => 'Letter',
      'default_font_size' => 0,
      'default_font' => '',
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 10,
      'margin_footer' => 20,
      'margin_top' => 40,
      'orientation' => 'P'
    );
    $mpdf = new \Mpdf\Mpdf($mpdfConfig);
    $mpdf->SetHTMLHeader($htmlheader);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }

  public function getReporteParticipantes()
  {

    $resultado = $this->reporte->getReporteParticipantes($_GET);

    $htmlheader = "<h1>Taekwondo Koryo</h1>";
    $htmlheader .= "<h3>Listado general de alumnos</h3>";
    $html = "<table width='100%' border='1'><thead><tr>";
    $html .= "<th>Corr</th>";
    $html .= "<th>Nombre</th>";
    $html .= "<th>Apellido</th>";
    $html .= "<th>Email</th>";
    $html .= "<th>Torneo</th>";
    $html .= "<th>Fecha</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td  style='text-align: center;'>" . ($key + 1) . "</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['apellido']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['email']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre_torneo']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['fecha']}</td>";
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    $mpdfConfig = array(
      'mode' => 'utf-8',
      'format' => 'Letter',
      'default_font_size' => 0,
      'default_font' => '',
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 10,
      'margin_footer' => 20,
      'margin_top' => 40,
      'orientation' => 'P'
    );
    $mpdf = new \Mpdf\Mpdf($mpdfConfig);
    $mpdf->SetHTMLHeader($htmlheader);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }

  public function getReporteEquipo()
  {

    $resultado = $this->reporte->getReporteEquipos($_GET);

    $htmlheader = "<h1>Taekwondo Koryo</h1>";
    $htmlheader .= "<h3>Listado general de alumnos</h3>";
    $html = "<table width='100%' border='1'><thead><tr>";
    $html .= "<th>Corr</th>";
    $html .= "<th>Equipo</th>";
    $html .= "<th>Stock</th>";
    $html .= "<th>Categoria</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td  style='text-align: center;'>" . ($key + 1) . "</td>";
      $html .= "<td  style='text-align: center;'>{$value['equipo']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['stock']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['categoria']}</td>";
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    $mpdfConfig = array(
      'mode' => 'utf-8',
      'format' => 'Letter',
      'default_font_size' => 0,
      'default_font' => '',
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 10,
      'margin_footer' => 20,
      'margin_top' => 40,
      'orientation' => 'P'
    );
    $mpdf = new \Mpdf\Mpdf($mpdfConfig);
    $mpdf->SetHTMLHeader($htmlheader);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }

  public function getReportePrestamos()
  {

    $resultado = $this->reporte->getReportePrestamos($_GET);

    $htmlheader = "<h1>Taekwondo Koryo</h1>";
    $htmlheader .= "<h3>Listado general de alumnos</h3>";
    $html = "<table width='100%' border='1'><thead><tr>";
    $html .= "<th>Corr</th>";
    $html .= "<th>Nombre</th>";
    $html .= "<th>Apellido</th>";
    $html .= "<th>Email</th>";
    $html .= "<th>Equipo</th>";
    $html .= "<th>Estado de prestamo</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td  style='text-align: center;'>" . ($key + 1) . "</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['apellido']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['email']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['equipo']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['estado_prestamo']}</td>";
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    $mpdfConfig = array(
      'mode' => 'utf-8',
      'format' => 'Letter',
      'default_font_size' => 0,
      'default_font' => '',
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 10,
      'margin_footer' => 20,
      'margin_top' => 40,
      'orientation' => 'P'
    );
    $mpdf = new \Mpdf\Mpdf($mpdfConfig);
    $mpdf->SetHTMLHeader($htmlheader);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }

  public function getReporteAsistencia()
  {

    $resultado = $this->reporte->getReporteAsistencia($_GET);

    $htmlheader = "<h1>Taekwondo Koryo</h1>";
    $htmlheader .= "<h3>Listado general de alumnos</h3>";
    $html = "<table width='100%' border='1'><thead><tr>";
    $html .= "<th>Corr</th>";
    $html .= "<th>Nombre</th>";
    $html .= "<th>Apellido</th>";
    $html .= "<th>Email</th>";
    $html .= "<th>Fecha</th>";
    $html .= "<th>Horario</th>";
    $html .= "<th>Hora</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td  style='text-align: center;'>" . ($key + 1) . "</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['apellido']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['email']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['fecha']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['nombre_horario']}</td>";
      $html .= "<td  style='text-align: center;'>{$value['hora']}</td>";
      $html .= "</tr>";
    }
    $html .= "</tbody></table>";
    $mpdfConfig = array(
      'mode' => 'utf-8',
      'format' => 'Letter',
      'default_font_size' => 0,
      'default_font' => '',
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 10,
      'margin_footer' => 20,
      'margin_top' => 40,
      'orientation' => 'P'
    );
    $mpdf = new \Mpdf\Mpdf($mpdfConfig);
    $mpdf->SetHTMLHeader($htmlheader);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }
}
