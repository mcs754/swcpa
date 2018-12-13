<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 13/12/2018
 * Time: 02:44
 */
$titulo = "Alteração de arquivo morto";
include 'cabecalho.php';
?>
    <div class="container cabecalho">
        <h1>Alterar arquivo morto</h1>
    </div>
<?php
if ($_POST) {
    $a2 = new \App\Model\Arquivo();
    $a2->setIdArquivoMorto($_POST['id_arquivo_morto']);
    $a2->setNomeArquivoMorto($_POST['nome_arquivo_morto']);
    $a2DAO = new \App\DAO\ArquivoDAO();
    if ($a2DAO->alterar($a2))
        header("Location: arquivo-listar-todos.php?msg=2");
}
$a = new \App\Model\Arquivo();
isset($_GET) ? $a->setIdArquivoMorto($_GET['id_arquivo_morto']) : $a->setIdArquivoMorto($_POST['id_arquivo_morto']);
$aDAO = new \App\DAO\ArquivoDAO();
$arquivos = $aDAO->pesquisarUm($a);
?>
<form action="arquivo-alterar.php" method="post">
    <div class="container">
        <div class="form-group alert alert-secondary" role="alert">
            <strong>Os campos com <span class="text-danger">*</span> não podem estar em branco.</strong>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_arquivo_morto"><span class="text-danger">*</span> Nome identificador da pasta</label>
                    <input type="text" id="nome_arquivo_morto" name="nome_arquivo_morto" class="form-control" value="<?php echo $arquivos['nome_arquivo_morto'];?>" required>
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
                    <button type="button" class="btn btn-outline-secondary btn-block" onClick="history.go(-1)">Voltar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include 'rodape.php';
?>
