<?php
//Este controlador esta relacionado con la vista principal del sistema
class Principal extends Controllers{
    function __construct(){
        parent::__construct();
    }

    public function principal(){
        $this->view->render($this,"principal");
    }
}
?>