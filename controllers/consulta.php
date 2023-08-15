<?php
class Consulta extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->datos = [];
        //echo "<p>ctrl Consulta</p>";
    }

    function render(){
        $alumnos =  $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function verAlumno($param = null){
        //var_dump($param);
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);

        session_start();
        $_SESSION['alumno_id'] = $alumno->id;
        echo "alumno_id ".$_SESSION['alumno_id']."-".$alumno->id;
        $this->view->alumno = $alumno;
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno(){
        session_start();
        //$id = $_SESSION['alumno_id'];
        //echo "alumno_id ".$_SESSION['alumno_id'] ;
        $id = $_POST['id'];
        $matricula = $_POST['matricula'];
        echo "matricula ".$_POST['matricula'] ;
        $nombre    = $_POST['nombre'];
        $apellido  = $_POST['apellido'];
        echo "id.".$id;
        $alumno = new Alumno();
        unset($_SESSION['alumno_id']);
        if($this->model->update(['matricula'=>$matricula,'nombre'=>$nombre,'apellido'=>$apellido, 'id'=>$id])){
            
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;

            $this->view->alumno = $alumno;
            $this->view->mensaje = "Registro Actualizado";
        }else{
            $this->view->alumno = $alumno;
            $this->view->mensaje = "Problema al Actualizar";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            $this->view->mensaje = "Alumno eliminado";
        }else{
            $this->view->mensaje = "No se pudo";
        }
        $this->render();
    }

}
?>