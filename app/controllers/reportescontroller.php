<?php
include_once "app/models/alumnos.php";
include_once "vendor/autoload.php";
class ReportesController extends Controller
{
  private $alumno;
  public function __construct($param)
  {
    $this->alumno = new Alumnos();
    parent::__construct("reportes", $param, true);
  }

  public function getReporteAlumnos()
  {

    $resultado = $this->alumno->getReporteAlumnos($_GET);

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
    $html .= "<th>Dui</th>";
    $html .= "</tr></thead><tbody>";
    foreach ($resultado as $key => $value) {
      $html .= "<tr>";
      $html .= "<td>" . ($key + 1) . "</td>";
      $html .= "<td>{$value['nombre']}</td>";
      $html .= "<td>{$value['apellido']}</td>";
      $html .= "<td>{$value['color']}</td>";
      $html .= "<td>{$value['hora']}</td>";
      $html .= "<td>{$value['fechanac']}</td>";
      $html .= "<td>{$value['email']}</td>";
      $html .= "<td>{$value['telefono']}</td>";
      $html .= "<td>{$value['dui']}</td>";
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
    //$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::FILE);
    //$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::DOWNLOAD);
  }
}
