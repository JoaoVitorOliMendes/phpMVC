<?php

//casse de controller generica - extendes conexaoBd para poder criar as querys genericas
class controller extends conexaoBd {

	//View default
    public static function renderView() {
        require_once './View/header.php';
        require_once './View/nav.php';
		require_once './View/forms.php';
        require_once './View/footer.php';
    }

	//Query generica
	public static function query($query, $params = array()) {
		try {
			$result = self::conectar()->prepare($query);
			$result->execute($params);
			if(explode(' ', $query)[0] == "select") {
				return $result->fetchAll(PDO::FETCH_CLASS, "cliente");
			}
		} catch(Exception $e) {
			die("Error: ".$e->getMessage());
		} finally {
			$result = null;
		}
	}
}

?>