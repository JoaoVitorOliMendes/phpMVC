<?php

//Classe cliente controller extendes controller para ter as funcionalidades genericas de um controller generico
class clienteController extends controller{

    //Overrides na funcao de renderizar a view
    public static function renderView() {
        require_once './View/header.php';
        require_once './View/nav.php';
        self::table_clientes();
        require_once './View/footer.php';
    }

    //Funcao para renderizar a tabela clientes
    public static function table_clientes(){
		?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Id</th>
                        <th class="text-center" scope="col">Nome</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Telefone</th>
                        <th class="text-center" scope="col">Data de Nascimento</th>
                        <th class="text-center" scope="col">Deletar</th>
                        <th class="text-center" scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Para cada linha na resposta do BD emprimir uma linha na tabela -->
                    <?php 
                        $resultBd = self::getAll();
                        if($resultBd) :
                            foreach ($resultBd as $cliente) : 
                    ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo $cliente->id_cliente;?></th>
                                    <td class="text-center"><?php echo $cliente->nome_cliente;?></td>
                                    <td class="text-center"><?php echo $cliente->email_cliente;?></td>
                                    <td class="text-center"><?php echo $cliente->telefone_cliente;?></td>
                                    <td class="text-center"><?php echo $cliente->data_nasc_cliente;?></td>
                                    <td class="text-center">
                                        <a
                                            href="http://localhost/desafioPhp?delete='<?php echo $cliente->id_cliente;?>'"
                                        >
                                            <img src="./assets/icons/trash-solid.svg" width="25px" height="25px">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="http://localhost/desafioPhp/new?update='<?php echo $cliente->id_cliente;?>'"
                                        >
                                            <img src="./assets/icons/pencil-alt-solid.svg" width="25px" height="25px">
                                        </a>
                                    </td>
                                </tr>
                    <?php 
                            endforeach;
                        else :     //Se nao existir resultados imprimir Nenhum cliente
                    ?>
                        <tr>
                            <td colspan="7">Nenhum cliente</td>
                        </tr>
                    <?php
                        endif;
                    ?>
                </tbody>
            </table>
        </div>
	    <?php
    }

    //Query para selecionar todos os clientes - select id_cliente, nome_cliente, email_cliente, telefone_cliente, senha_cliente, data_nasc_cliente from clientes;
    private static function getAll() {
        return self::query("select id_cliente, nome_cliente, email_cliente, telefone_cliente, senha_cliente, data_nasc_cliente from clientes;");
    }

    //Query para selecionar 1 unico cliente - select id_cliente, nome_cliente, email_cliente, telefone_cliente, senha_cliente, data_nasc_cliente from clientes where id_cliente=".$id.";
    public static function getById($id) {
        return self::query("select id_cliente, nome_cliente, email_cliente, telefone_cliente, senha_cliente, data_nasc_cliente from clientes where id_cliente=".$id.";");
    }

    //Query para inserir um novo cliente - insert into clientes values(?,?,?,?,?,?);
    public static function insertNew($cliente) {
        return self::query("insert into clientes values(?,?,?,?,?,?);", array($cliente->id_cliente, $cliente->nome_cliente, $cliente->email_cliente, $cliente->telefone_cliente, $cliente->senha_cliente, $cliente->data_nasc_cliente));
    }

    //Query para atualizar determinado cliente - update clientes set nome_cliente = ?, email_cliente = ?, telefone_cliente = ?, senha_cliente = ?, data_nasc_cliente = ? where id_cliente = ?;
    public static function update($cliente) {
        return self::query("update clientes set nome_cliente = ?, email_cliente = ?, telefone_cliente = ?, senha_cliente = ?, data_nasc_cliente = ? where id_cliente = ?;", array($cliente->nome_cliente, $cliente->email_cliente, $cliente->telefone_cliente, $cliente->senha_cliente, $cliente->data_nasc_cliente, $cliente->id_cliente));
    }

    //Query para deletar determinado cliente - delete from clientes where id_cliente = ".$id.";
    public static function delete($id) {
        return self::query("delete from clientes where id_cliente = ".$id.";");
    }
}