<?php
$titulo = "Cadastrar arquivo";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Cadastrar nova pasta de arquivo morto</h1>
</div>
<form action="arquivo-cadastrar.php" method="post">
    <div class="container">
<?php
if ($_POST){
    $a = new \App\Model\Arquivo();
    $a->setNomeArquivoMorto($_POST['nome_arquivo_morto']);
    $aDAO = new \App\DAO\ArquivoDAO();
    if ($aDAO->inserir($a))
        echo "<div class='form-group alert alert-success'>Pasta de arquivo morto cadastrado com sucesso!</div>";
}
?>
        <div class="form-group alert alert-secondary" role="alert">
    <strong>Os campos com <span class="text-danger">*</span> não podem estar em branco.</strong>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome_arquivo_morto"><span class="text-danger">*</span> Nome identificador da pasta</label>
            <input type="text" id="nome_arquivo_morto" name="nome_arquivo_morto" class="form-control" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-success btn-block">Cadastrar</button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <a type="link" class="btn btn-outline-secondary btn-block" href="index.php">Cancelar</a>
        </div>
    </div>
</div>
</div>
</form>
<?php
include 'rodape.php';
?>
