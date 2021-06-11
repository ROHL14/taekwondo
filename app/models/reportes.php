<?php
include_once "app/models/db.class.php";
class Reportes extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getReporteAlumnos($data)
  {
    $condicion = "";
    if ($data["id_cinta"] != "0") {
      $condicion .= " and c.id_cinta='{$data['id_cinta']}'";
    }

    return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");
  }

  public function getReporteTorneos($data)
  {
    $condicion = "";
    if ($data["id_pais"] != "0") {
      $condicion .= " and b.id_pais='{$data['id_pais']}'";
    }

    /*return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");*/

    return $this->executeQuery("
    Select a.*, b.pais from paises b 
    inner join torneos a on b.id_pais=a.id_pais 
    where 1=1 $condicion");
  }

  public function getReporteParticipantes($data)
  {
    $condicion = "";
    if ($data["id_torneo"] != "0") {
      $condicion .= " and b.id_torneo='{$data['id_torneo']}'";
    }

    /*return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");*/

    return $this->executeQuery("
    Select a.*, b.*, c.* from alumnos c 
    inner join (torneos b inner join participantes a on b.id_torneo=a.id_torneo) 
    on c.id_alumno=a.id_alumno 
    where 1=1 $condicion");
  }

  public function getReporteEquipos($data)
  {
    $condicion = "";
    if ($data["id_categoria"] != "0") {
      $condicion .= " and b.id_categoria='{$data['id_categoria']}'";
    }

    /*return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");*/

    return $this->executeQuery("
    Select a.*, b.categoria from categorias b 
    inner join equipo a 
    on b.id_categoria=a.id_categoria 
    where 1=1 $condicion");
  }

  public function getReportePrestamos($data)
  {
    $condicion = "";
    if ($data["id_alumno"] != "0") {
      $condicion .= " and c.id_alumno='{$data['id_alumno']}'";
    }
    if ($data["id_equipo"] != "0") {
      $condicion .= " and b.id_equipo='{$data['id_equipo']}'";
    }

    /*return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");*/

    return $this->executeQuery("
    Select a.*, b.*, c.* from alumnos c 
    inner join (equipo b inner join prestamos a on b.id_equipo=a.id_equipo) 
    on c.id_alumno=a.id_alumno
    where 1=1 $condicion");
  }

  public function getReporteAsistencia($data)
  {
    $condicion = "";
    if ($data["id_horario"] != "0") {
      $condicion .= " and c.id_horario='{$data['id_horario']}'";
    }
    if ($data["id_alumno"] != "0") {
      $condicion .= " and b.id_alumno='{$data['id_alumno']}'";
    }

    /*return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");*/

    return $this->executeQuery("
    Select a.*, b.*, c.* from horarios c 
    inner join (alumnos b inner join asistencia a on b.id_alumno=a.id_alumno) 
    on c.id_horario=b.id_horario 
    where 1=1 $condicion order by fecha desc");
  }
}
