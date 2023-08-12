<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
        echo "<p>ctrl main</p>";
    }

    function saludo(){
        echo "<p>Saludo MEtodo</p>";
    }
}
?>