<?php

//POPO(Plain Old PHP Object (POPO)) cliente
class cliente {

    public $id_cliente = 0;
    public $nome_cliente;
    public $email_cliente;
    public $telefone_cliente;
    public $senha_cliente;
    public $data_nasc_cliente;

    //Nao sobrescreve o metodo __construct, pois o PDO::FETCH_CLASS nao aceita outros construtores
    public function construct($nome_cliente, $email_cliente, $telefone_cliente, $senha_cliente, $data_nasc_cliente) {
        $this->nome_cliente = $nome_cliente;
        $this->email_cliente = $email_cliente;
        $this->telefone_cliente = $telefone_cliente;
        $this->senha_cliente = $senha_cliente;
        $this->data_nasc_cliente = $data_nasc_cliente;
    }
}

?>