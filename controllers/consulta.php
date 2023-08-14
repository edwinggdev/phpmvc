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

}
?>