<?php

//Classe de conexao - MUDAR CONFIGURACAO DO BD PARA FUNCIONAR
class conexaoBd {
	private static $servidor = "localhost:3306";
	private static $banco = "clientesConstrusite";
	private static $usuario = "root";
	private static $senha = "";
	
	//Conexao PDO
	protected static function conectar() {
		try{
		    $con = new PDO("mysql:host=".self::$servidor.";dbname=".self::$banco.";charset=utf8;",self::$usuario, self::$senha);
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		    return $con;
		}catch(Exception $msg){
			echo "error: {$msg->getMessage()}";
		}
	}
}

?>