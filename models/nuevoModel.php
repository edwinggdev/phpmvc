<?php 
class nuevoModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{ 
            $query = $this->db->connect()->prepare('INSERT INTO alumnos (matricula,nombre,apellido) VALUES (:matricula, :nombre, :apellido)');
            $query->execute(['matricula'=>$datos['matricula'],'nombre'=>$datos['nombre'], 'apellido'=>$datos['apellido']]);
            echo "datos insertados"; 
        }catch(PDOExceptio $e){
            echo " Error Insertando " .$e;
        }
        echo "datos insertados";
    }
}
?>