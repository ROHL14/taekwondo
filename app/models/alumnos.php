<?php
include_once "app/models/db.class.php";
class Alumnos extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select a.*, b.color from cintas b inner join alumnos a on b.id_cinta=a.id_cinta");
  }

  public function getAlumnoByCinta($id)
  {
    return $this->executeQuery("Select a.*, b.color from cintas b inner join alumnos a on b.id_cinta=a.id_cinta where b.id_cinta='$id'");
  }

  public function getOneAlumnoByID($id)
  {
    return $this->executeQuery("
    Select a.*, b.color, c.hora from horarios c 
    inner join (cintas b inner join alumnos a on b.id_cinta=a.id_cinta) 
    on c.id_horario=a.id_horario where a.id_alumno='$id'");
  }

  public function getAllCintas()
  {
    return $this->executeQuery("Select * from cintas");
  }

  public function save($data)
  {
    return $this->executeInsert("
    insert into alumnos set nombre='{$data['nombre']}', 
    apellido='{$data['apellido']}',
    dui='{$data['dui']}',
    fechanac='{$data['fechanac']}',
    email='{$data['email']}',
    telefono='{$data['telefono']}',
    estado='{$data['estado']}',
    id_cinta='{$data['id_cinta']}',
    id_horario='{$data['id_horario']}' 
    ");
  }

  public function update($data)
  {
    return $this->executeUpdate("
    update alumnos set nombre='{$data['nombre']}', 
    apellido='{$data['apellido']}',
    dui='{$data['dui']}',
    fechanac='{$data['fechanac']}',
    email='{$data['email']}',
    telefono='{$data['telefono']}', 
    estado='{$data['estado']}', 
    id_cinta='{$data['id_cinta']}',
    id_horario='{$data['id_horario']}' 
    where id_alumno='{$data['id_alumno']}'
    ");
  }

  public function getAlumnoByName($email)
  {
    return $this->executeQuery("Select * from alumnos where email='$email'");
  }

  public function getAlumnoByNameAndId($email, $id)
  {
    return $this->executeQuery("Select * from alumnos where email='$email' and id_alumno<>'$id'");
  }

  public function getOneAlumno($id)
  {
    return $this->executeQuery("Select * from alumnos where id_alumno='$id'");
  }

  public function deleteAlumno($id)
  {
    return $this->executeUpdate("delete from alumnos where id_alumno='$id'");
  }

  public function getReporteAlumnos($data)
  {
    $condicion = "";
    if ($data["id_cinta"] != "0") {
      $condicion .= " and c.id_cinta='{$data['id_cinta']}'";
    }

    //return $this->executeQuery("Select a.*, b.*, c.* from cintas c inner join (horarios b inner join alumnnos a on b.id_horario=a.id_horario) on c.id_cinta=a.id_cinta where 1=1 $condicion");
    //return $this->executeQuery("Select a.*, b.* from cintas b inner join alumnos a on b.id_cinta=a.id_cinta");
    //return $this->executeQuery("Select * from alumnos");
    return $this->executeQuery("
    Select a.*, b.hora, c.color from cintas c 
    inner join (horarios b inner join alumnos a on b.id_horario=a.id_horario) 
    on c.id_cinta=a.id_cinta 
    where 1=1 $condicion");
  }
}
