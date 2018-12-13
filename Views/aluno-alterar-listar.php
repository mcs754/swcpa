<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 04/12/2018
 * Time: 23:30
 */
$titulo = "Alteração de estudante";
include 'cabecalho.php';
?>
    <div class="container cabecalho">
        <h1>Alterar estudante</h1>
    </div>
<?php
if ($_POST) {
    $a2 = new \App\Model\Aluno();
    $a2->setNomeArquivoMorto($_POST['nome_arquivo_morto']);
    $a2->setIdAluno($_POST['id_aluno']);
    $a2->setIdArquivoMorto($_POST['id_arquivo_morto']);
    $a2->setNumAluno($_POST['num_aluno']);
    $a2->setCpfAluno($_POST['cpf_aluno']);
    !empty($_POST['data_nascimento_aluno']) ? $a2->setDataNascimentoAluno(\App\Helper\Data::set($_POST['data_nascimento_aluno'])) : $a2->setDataNascimentoAluno(null);
    $a2->setNomeAluno($_POST['nome_aluno']);
    $a2->setNomeMaeAluno($_POST['nome_mae_aluno']);
    $a2->setObservacaoAluno($_POST['observacao_aluno']);
    $a2DAO = new \App\DAO\AlunoDAO();
    if ($a2DAO->alterar($a2))
        header("Location: aluno-listar-todos.php?msg=2");
}
$a = new \App\Model\Aluno();
isset($_GET) ? $a->setIdAluno($_GET['id_aluno']) : $a->setIdAluno($_POST['id_aluno']);
$aDAO = new \App\DAO\AlunoDAO();
$alunos = $aDAO->pesquisarUm($a);
?>
<form action="aluno-alterar-listar.php" method="post">
    <div class="container">
        <div class="form-group alert alert-secondary" role="alert">
            <strong>Os campos com <span class="text-danger">*</span> não podem estar em branco.</strong>
        </div>
        <input type="hidden" id="nome_arquivo_morto" name="nome_arquivo_morto" value="<?php echo $alunos['nome_arquivo_morto']; ?>">
        <input type="hidden" id="id_aluno" name="id_aluno" value="<?php echo $alunos['id_aluno']; ?>">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="id_arquivo_morto"><span class="text-danger">*</span> Nome da pasta de arquivo morto</label>
                <select id="id_arquivo_morto" name="id_arquivo_morto" class="form-control">
                    <option value="<?php echo $alunos['id_arquivo_morto'];?>" selected><?php echo $alunos['nome_arquivo_morto'];?></option>
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
                    <label for="num_aluno"><span class="text-danger">*</span> Número da pasta do estudante</label>
                    <input type="number" id="num_aluno" name="num_aluno" class="form-control" value="<?php echo $alunos['num_aluno'];?>" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf_aluno">CPF do estudante</label>
                    <input type="number" id="cpf_aluno" name="cpf_aluno" class="form-control" value="<?php echo $alunos['cpf_aluno'];?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="data_nascimento_aluno"><span class="text-danger">*</span> Data de nascimento</label>
                    <input type="date" id="data_nascimento_aluno" name="data_nascimento_aluno" class="form-control" value="<?php echo $alunos['data_nascimento_aluno'];?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_aluno"><span class="text-danger">*</span> Nome completo do estudante sem
                        abreviações</label>
                    <input type="text" id="nome_aluno" name="nome_aluno" class="form-control" value="<?php echo $alunos['nome_aluno'];?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_mae_aluno"><span class="text-danger">*</span> Nome completo da mãe do estudante sem abreviações</label>
                    <input type="text" id="nome_mae_aluno" name="nome_mae_aluno" class="form-control" value="<?php echo $alunos['nome_mae_aluno'];?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="observacao_aluno">Observação</label>
                    <textarea id="observacao_aluno" name="observacao_aluno" class="form-control" value="<?php echo $alunos['observacao_aluno'];?>" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-block">Alterar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include 'rodape.php';
?>
