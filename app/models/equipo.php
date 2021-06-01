<?php
include_once "app/models/db.class.php";
class Equipo extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select a.*, b.categoria from categorias b inner join equipo a on b.id_categoria=a.id_categoria");
  }

  public function getEquipoByCategoria($id)
  {
    return $this->executeQuery("Select a.*, b.categoria from categorias b inner join equipo a on b.id_categoria=a.id_categoria where b.id_categoria='$id'");
  }

  public function getOneEquipoByID($id)
  {
    return $this->executeQuery("Select a.*, b.categoria from categorias b inner join equipo a on b.id_categoria=a.id_categoria where a.id_equipo='$id'");
  }

  public function getAllCategorias()
  {
    return $this->executeQuery("Select * from categorias");
  }

  public function save($data)
  {
    return $this->executeInsert("
    insert into equipo set equipo='{$data['equipo']}', 
    stock='{$data['stock']}', 
    id_categoria='{$data['id_categoria']}'
    ");
  }

  public function update($data)
  {
    return $this->executeUpdate("
    update equipo set equipo='{$data['equipo']}', 
    stock='{$data['stock']}', 
    id_categoria='{$data['id_categoria']}' 
    where id_equipo='{$data['id_equipo']}'
    ");
  }

  public function getEquipoByName($equipo)
  {
    return $this->executeQuery("Select * from equipo where equipo='$equipo'");
  }

  public function getEquipoByNameAndId($equipo, $id)
  {
    return $this->executeQuery("Select * from equipo where equipo='$equipo' and id_equipo<>'$id'");
  }

  public function getOneEquipo($id)
  {
    return $this->executeQuery("Select * from equipo where id_equipo='$id'");
  }

  public function deleteEquipo($id)
  {
    return $this->executeUpdate("delete from equipo where id_equipo='$id'");
  }
}
