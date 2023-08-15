<?php 
include_once 'models/alumno.php';

class consultaModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM alumnos");
            while($row = $query->fetch()){
                $item = new Alumno();
                $item->id = $row['id'];
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];       
                array_push($items, $item);         
            }

            return $items;
        }catch(PDOExceptio $e){
            echo $e;
        }
    }

    function getById($id){
        $item = new Alumno();
        $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE id = :id");
        try{
            $query->execute(['id'=> $id]);
            while($row = $query->fetch()){
                $item->id = $row['id'];
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
            }
            return $item;
        }catch(DBOException $e){
            return [];
        }
    }

    function update($item){
        var_dump($item);
        //$sql = ; echo $sql;
        //$query = $this->db->connect()->prepare("UPDATE alumnos SET nombre = ':nombre', apellido=':apellido' WHERE matricula = :matricula");
        try{
            $query = $this->db->connect()->prepare("UPDATE alumnos SET matricula= :matricula, nombre = :nombre, apellido=:apellido WHERE id = :id");
            $query->bindValue('id', $item['id']);
            $query->bindValue('matricula', $item['matricula']);
            $query->bindValue('nombre', $item['nombre']);
            $query->bindValue('apellido', $item['apellido']);
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    function delete($id){
        echo $id;
        //$sql = ; echo $sql;
        $query = $this->db->connect()->prepare("DELETE FROM alumnos WHERE matricula = :matricula");
        try{
            $query->execute(
                [
                'matricula'=>$id,
                ]
            );
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
}
?>