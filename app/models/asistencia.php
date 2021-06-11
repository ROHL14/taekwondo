<?php
include_once "app/models/db.class.php";
class Asistencia extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select a.*, b.*, c.* from horarios c inner join (alumnos b inner join asistencia a on b.id_alumno=a.id_alumno) on c.id_horario=b.id_horario");
  }

  public function getAsistenciaByHorario($id)
  {
    return $this->executeQuery("Select a.*, b.*, c.* from horarios c inner join (alumnos b inner join asistencia a on b.id_alumno=a.id_alumno) on c.id_horario=b.id_horario where c.id_horario='$id'");
  }

  public function getOneAsistenciaByID($id)
  {
    return $this->executeQuery("Select a.*, b.*, c.* from horarios c inner join (alumnos b inner join asistencia a on b.id_alumno=a.id_alumno) on c.id_horario=b.id_horario where a.id_asistencia='$id'");
  }

  public function getAllHorarios()
  {
    return $this->executeQuery("Select * from horarios");
  }

  public function getAllAlumnos()
  {
    return $this->executeQuery("Select a.*, b.*, c.* from cintas c inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) on c.id_cinta=a.id_cinta order by b.hora asc");
    /*return $this->executeQuery("Select a.*, b.* from alumnos a inner join cintas b on a.id_cinta=b.id_cinta");*/
  }

  public function save($data)
  {
    return $this->executeInsert("insert into asistencia set id_alumno='{$data['id_alumno']}', fecha='{$data['fecha']}'");
  }

  public function update($data)
  {
    return $this->executeUpdate("update libros set id_alumno='{$data['id_alumno']}', fecha='{$data['fecha']}' where id_asistencia='{$data['id_asistencia']}'");
  }

  public function getOneAsistencia($idalumno, $fecha)
  {
    return $this->executeQuery("Select * from asistencia where id_alumno='$idalumno' and fecha='$fecha'");
  }

  public function deleteAsistencia($idalumno, $fecha)
  {
    return $this->executeUpdate("delete from asistencia where id_alumno='$idalumno' and fecha='$fecha'");
  }
}
