<?php

//Classe de rota
class route {

    //Array com rotas predefinidas
    public static $validroutes = array();

    //Caso o url seja igual a rota, invocar funcao de renderizar a view
    public static function set($route, $function) {
        self::$validroutes[] = $route;

        if($_GET['url'] == $route) {
            $function->__invoke();
        }
    }

}

?>