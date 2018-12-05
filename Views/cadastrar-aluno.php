<?php
$titulo = "Cadastrar aluno";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Cadastrar nova pasta de estudante</h1>
</div>
<form action="cadastrar-aluno.php" method="post">
    <div class="container">

<?php
if ($_POST){
    $a = new \App\Model\Aluno();
    $a->setIdArquivoMorto($_POST['id_arquivo_morto']);
    $a->setNumAluno($_POST['num_aluno']);
    $a->setCpfAluno($_POST['cpf_aluno']);
    $a->setNomeAluno($_POST['nome_aluno']);
    $a->setNomeMaeAluno($_POST['nome_mae_aluno']);
    $a->setObservacaoAluno($_POST['observacao_aluno']);
    $aDAO = new \App\DAO\AlunoDAO();
    if ($aDAO->inserir($a))
        echo "<div class='form-group alert alert-success'>Nova pasta de estudante cadastrado com sucesso!</div>";
}
?>

        <div class="form-group alert alert-secondary" role="alert">
            <strong>Os campos com <span class="text-danger">*</span> não podem estar em branco.</strong>
        </div>
        <div class="row">



            <div class="form-group col-md-4">
                <label for="nome_arquivo_morto"><span class="text-danger">*</span> Nome identificador da pasta</label>
                <select id="nome_arquivo_morto" class="form-control chosen">
                    <option disabled selected>Selecione a pasta</option>
                    <option>A1</option>
                </select>
            </div>



            <!--
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_arquivo_morto"><span class="text-danger">*</span> Número da pasta do arquivo morto</label>
                    <input type="number" id="id_arquivo_morto" name="id_arquivo_morto" class="form-control" required>
                </div>
            </div>
            -->




            <div class="col-md-4">
                <div class="form-group">
                    <label for="num_aluno"><span class="text-danger">*</span> Número da pasta do estudante</label>
                    <input type="number" id="num_aluno" name="num_aluno" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cpf_aluno">CPF do estudante</label>
                    <input type="number" id="cpf_aluno" name="cpf_aluno" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_aluno"><span class="text-danger">*</span> Nome completo do estudante sem abreviações</label>
                    <input type="text" id="nome_aluno" name="nome_aluno" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_mae_aluno"><span class="text-danger">*</span> Nome completo da mãe do estudante sem abreviações</label>
                    <input type="text" id="nome_mae_aluno" name="nome_mae_aluno" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="observacao_aluno">Observação</label>
                    <textarea id="observacao_aluno" name="observacao_aluno" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-success btn-block">Cadastrar</button>
        </div>
    </div>
</form>
<?php
include 'rodape.php';
?>
