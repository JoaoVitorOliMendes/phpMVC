<?php

//Se receber informacoes POST -> cadastrar no sistema
if(
    isset($_POST["nome"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["senha"]) &&
    isset($_POST["data"])
) {
    if(isset($_POST["id"])) {       //Se receber informacoes POST + ID -> atualizar no sistema
        //Formata data para MySql e instancia um novo cliente
        $date = date("Y-m-d", strtotime($_POST["data"]));
        $cliente = new cliente();
        $cliente->construct($_POST["nome"], $_POST["email"], $_POST["tel"], $_POST["senha"], $date);
        $cliente->id_cliente = $_POST["id"];

        clienteController::update($cliente);
    }else {
        $date = date("Y-m-d", strtotime($_POST["data"]));
        $cliente = new cliente();
        $cliente->construct($_POST["nome"], $_POST["email"], $_POST["tel"], $_POST["senha"], $date);
        
        clienteController::insertNew($cliente);
    }
}else if(isset($_GET["delete"])) {       //Se receber parametro GET com nome @delete -> deletar no sistema por id
    clienteController::delete($_GET["delete"]);
}



//Definindo rotas
route::set('index.php', function() {
    clienteController::renderView();        //Rota padrao
});

route::set('new', function() {
    controller::renderView();               //Rota para forms
});

?>