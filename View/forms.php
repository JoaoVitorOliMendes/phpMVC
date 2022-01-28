<!-- Forms -->
<?php
$cliente;

//Se existir um parametro GET nomeado update -> pesquisar cliente por id
if(isset($_GET["update"])) {
    $cliente = clienteController::getById($_GET["update"])[0];
}

?>

<div class="container p-5">
    <!-- POST para index.php -->
    <form id="forms" action="http://localhost/desafioPhp/" method="POST">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h3>Cadastro de Clientes</h3>
            </div>

            <!-- Input sem display apenas para ser definido o id dado pelo sistema -->
            <input type="text" name="id" id="id" style="display: none;" value="<?php if(isset($cliente)) { echo $cliente->id_cliente; } ?>">

            <!-- Para cada input e definido seu respectivo valor caso seja um update de cliente -->
            <div class="col-md-8">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="nome">Nome</label>
                    </div>
                    <input type="text" name="nome" id="nome" value="<?php if(isset($cliente)) { echo $cliente->nome_cliente; } ?>" required class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="email">Email</label>
                    </div>
                    <input type="email" name="email" id="email" value="<?php if(isset($cliente)) {  echo $cliente->email_cliente; } ?>" required class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="tel">Telefone</label>
                    </div>
                    <input type="tel" name="tel" oninput=mascara() maxlength="13" id="tel" value="<?php if(isset($cliente)) { echo $cliente->telefone_cliente; } ?>" required class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="data">Data de nascimento</label>
                    </div>
                    <input type="date" name="data" id="data" value="<?php if(isset($cliente)) {  echo $cliente->data_nasc_cliente; } ?>" required class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="senha">Senha</label>
                    </div>
                    <input type="password" name="senha" id="senha" value="<?php if(isset($cliente)) {  echo $cliente->senha_cliente; } ?>" required class="form-control">
                </div>
            </div>
            <button type="submit" name="salvar" value="salvar" class="form-group col-5 btn btn-success">Salvar &nbsp&nbsp<i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>
