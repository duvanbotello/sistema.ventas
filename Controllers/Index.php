<?php
    class Index extends Controllers
    {
        public function __construct() {
            //ejecutamos el metodo constructor de la clase padre.
            parent::__construct();
        }

        public function index(){
            //ejecuto el metodo render de la libreria Views le paso el cotrolador y la vista como parametro
            $this->view->render($this,"index");
        }
    }
    

?>