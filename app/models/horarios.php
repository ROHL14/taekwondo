<?php
include_once "app/models/db.class.php";
class Horarios extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select * from horarios order by id_horario");
  }

  public function save($data)
  {
    return $this->executeInsert("insert into horarios set nombre_horario='{$data['nombre_horario']}', hora='{$data['hora']}'");
  }

  public function update($data)
  {
    return $this->executeUpdate("update horarios set nombre_horario='{$data['nombre_horario']}', hora='{$data['hora']}' where id_horario='{$data['id_horario']}'");
  }

  public function getHorarioByName($nombre_horario)
  {
    return $this->executeQuery("Select * from horarios where nombre_horario='$nombre_horario'");
  }

  public function getHorarioByNameAndId($nombre_horario, $id)
  {
    return $this->executeQuery("Select * from horarios where nombre_horario='$nombre_horario' and id_horario<>'$id'");
  }

  public function getOneHorario($id)
  {
    return $this->executeQuery("Select * from horarios where id_horario='$id'");
  }

  public function deleteHorario($id)
  {
    return $this->executeUpdate("delete from horarios where id_horario='$id'");
  }
}
