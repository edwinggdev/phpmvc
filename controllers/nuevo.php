<?php
class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        echo "<p>ctrl NUevo</p>";
    }

    function render(){
        $this->view->render('nuevo/index');
    }

    function saludo(){
        echo "<p>Saludo MEtodo</p>";
    }

    function registrarAlumno(){
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        
        if($this->model->insert(['matricula'=>$matricula, 'nombre'=>$nombre, 'apellido'=>$apellido])){
            $mensaje = "Alumno Creado";
        }else{
            $mensaje = " Alumno ya Existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
?>