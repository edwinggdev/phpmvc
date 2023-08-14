<?php
class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('nuevo/index');
        echo "<p>ctrl NUevo</p>";
    }

    function saludo(){
        echo "<p>Saludo MEtodo</p>";
    }

    function registrarAlumno(){
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        echo "alumno Creado";
        $this->model->insert(['matricula'=>$matricula, 'nombre'=>$nombre, 'apellido'=>$apellido]);
        
    }
}
?>