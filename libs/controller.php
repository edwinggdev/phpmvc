<?php
class Controller{
    function __construct(){
        echo "<p>controller Base</p>";
        $this->view = new View();
    }
}
?>