<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        
        echo "<p>ctrl main</p>";
    }

    function render(){
        $this->view->render('main/index');
    }

    function saludo(){
        echo "<p>Saludo MEtodo</p>";
    }
}
?>