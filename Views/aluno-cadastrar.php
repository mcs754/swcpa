<?php
$titulo = "Cadastrar estudante";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Cadastrar nova pasta de estudante</h1>
</div>
<form action="aluno-cadastrar.php" method="post">
    <div class="container">
        <?php
        if ($_POST) {
            $a = new \App\Model\Aluno();
            $a->setIdArquivoMorto($_POST['id_arquivo_morto']);
            $a->setIdArquivoMorto($_POST['id_arquivo_morto']);
            $a->setNumAluno($_POST['num_aluno']);
            !empty($_POST['cpf_aluno']) ? $a->setCpfAluno(\App\Helper\Cpf::set($_POST['cpf_aluno'])) : $a->setCpfAluno(null);
            !empty($_POST['data_nascimento_aluno']) ? $a->setDataNascimentoAluno(\App\Helper\Data::set($_POST['data_nascimento_aluno'])) : $a->setDataNascimentoAluno(null);
            $a->setNomeAluno($_POST['nome_aluno']);
            $a->setNomeMaeAluno($_POST['nome_mae_aluno']);
            $a->setObservacaoAluno($_POST['observacao_aluno']);
            $aDAO = new \App\DAO\AlunoDAO();
            if ($aDAO->inserir($a)) {
                echo "<div class='form-group alert alert-success'>Nova pasta de estudante cadastrada com sucesso!</div>";
            } else {
                echo "<div class='form-group alert alert-danger'>Nova pasta de estudante não foi cadastrada!</div>";
            }
        }
        ?>
        <div class="form-group alert alert-secondary" role="alert">
            <strong>Os campos com <span class="text-danger">*</span> não podem estar em branco.</strong>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="id_arquivo_morto"><span class="text-danger">*</span> Arquivo morto</label>
                <select name="id_arquivo_morto" class="form-control">
                    <option disabled selected>Selecione</option>
                    <?php
                    $arq = new \App\Model\Arquivo();
                    $aDAO = new \App\DAO\ArquivoDAO();
                    $arquivos = $aDAO->pesquisarArquivos($arq);
                    foreach ($arquivos as $arquivo) {
                        echo "<option value='{$arquivo->getIdArquivoMorto()}'>{$arquivo->getNomeArquivoMorto()}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="num_aluno"><span class="text-danger">*</span> Número da pasta</label>
                    <input type="number" id="num_aluno" name="num_aluno" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf_aluno">CPF</label>
                    <input type="number" id="cpf_aluno" name="cpf_aluno" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="data_nascimento_aluno"><span class="text-danger">*</span> Nascimento</label>
                    <input type="date" id="data_nascimento_aluno" name="data_nascimento_aluno" class="form-control" required>
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
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-block">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include 'rodape.php';
?>

