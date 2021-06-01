<?php
include_once "app/models/db.class.php";
class Torneos extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select a.*, b.pais from paises b inner join torneos a on b.id_pais=a.id_pais");
    //return $this->executeQuery("Select * from torneos");
  }

  public function getTorneosByPais($id)
  {
    return $this->executeQuery("Select a.*, b.pais from paises b inner join torneos a on b.id_pais=a.id_pais where b.id_pais='$id'");
  }

  public function getOneTorneoByID($id)
  {
    return $this->executeQuery("Select a.*, b.pais from paises b inner join torneos a on b.id_pais=a.id_pais where a.id_torneo='$id'");
  }

  public function getAllPaises()
  {
    return $this->executeQuery("Select * from paises");
  }

  public function save($data)
  {
    return $this->executeInsert("
    insert into torneos set nombre_torneo='{$data['nombre_torneo']}', 
    fecha='{$data['fecha']}', 
    direccion='{$data['direccion']}', 
    estado_torneo='pendiente', 
    id_pais='{$data['id_pais']}'
    ");
  }

  public function update($data)
  {
    return $this->executeUpdate("
    update torneos set nombre_torneo='{$data['nombre_torneo']}', 
    fecha='{$data['fecha']}', 
    direccion='{$data['direccion']}', 
    id_pais='{$data['id_pais']}' 
    where id_torneo='{$data['id_torneo']}'
    ");
  }

  public function updateEstado($data)
  {
    return $this->executeUpdate("
    update torneos set 
    estado='{$data['estado']}' 
    where id_torneo='{$data['id_torneo']}'
    ");
  }

  public function getTorneoByName($nombre_torneo)
  {
    return $this->executeQuery("Select * from torneos where nombre_torneo='$nombre_torneo'");
  }

  public function getTorneoByNameAndId($nombre_torneo, $id)
  {
    return $this->executeQuery("Select * from torneos where nombre_torneo='$nombre_torneo' and id_torneo<>'$id'");
  }

  public function getOneTorneo($id)
  {
    return $this->executeQuery("Select * from torneos where id_torneo='$id'");
  }

  public function deleteTorneo($id)
  {
    return $this->executeUpdate("delete from torneos where id_torneo='$id'");
  }
}
