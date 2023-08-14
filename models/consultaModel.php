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
}
?>