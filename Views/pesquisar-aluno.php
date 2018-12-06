<?php
$titulo = "Pesquisar estudante";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Pesquisar estudante</h1>
</div>
<div class="container">
    <?php
    $a = new \App\Model\Aluno();
    if (isset($_GET['parametros']) ? $a->setCpfAluno($_GET['cpf_aluno']) : $a->setCpfAluno("")){}
    elseif (isset($_GET['parametros']) ? $a->setNomeAluno($_GET['nome_aluno']) : $a->setNomeAluno("")){}
    else (isset($_GET['parametros']) ? $a->setNomeMaeAluno($_GET['nome_mae_aluno']) : $a->setNomeMaeAluno(""));
    $aDAO = new \App\DAO\AlunoDAO();
    $alunos = $aDAO->pesquisar($a);
    if (count($alunos) > 0) {
    if (isset($_GET['msg']) && $_GET['msg'] == 1)
        echo "<div class='form-group alert alert-success'>Estudante excluído com sucesso!</div>";
    if (isset($_GET['msg']) && $_GET['msg'] == 2)
        echo "<div class='form-group alert alert-success'>Estudante alterado com sucesso!</div>";
    ?>
    <table class='table-sm table-bordered table-condensed table-striped table-hover'>
        <tr class='text-center'>
            <th><img src="/Imagens/archive_3994357.png" width='18' heght='18' title="Arquivo"></th>
            <th><img src="/Imagens/directory_3994364.png" width='18' heght='18' title="Pasta"></th>
            <th width="10">CPF</th>
            <th width="30">Nascimento</th>
            <th width="300" class="text-left">Nome</th>
            <th width="300" class="text-left">Mãe</th>
            <th width="300" class="text-left">Observação</th>
            <th width="5"></th>
            <th width="5"></th>
        </tr>
        <?php
        foreach ($alunos as $aluno){
            echo "<tr class='text-center'>";
            echo "<td class='font-weight-bold'>{$aluno->getIdArquivoMorto()}</td>";
            echo "<td class='font-weight-bold'>{$aluno->getNumAluno()}</td>";
            echo "<td>{$aluno->getCpfAluno()}</td>";
            echo "<td>".\App\Helper\Data::get($aluno->getDataNascimentoAluno())."</td>";
            echo "<td class='text-left text-capitalize'>{$aluno->getNomeAluno()}</td>";
            echo "<td class='text-left text-capitalize'>{$aluno->getNomeMaeAluno()}</td>";
            echo "<td class='text-left text-lowercase'>{$aluno->getObservacaoAluno()}</td>";
            echo "<td><a href='#'><img src='/Imagens/edit_3994420.png' width='18' heght='18' title='Editar'></a></td>";
            echo "<td><a href='aluno-excluir.php'><img src='/Imagens/delete_3994410.png' width='18' heght='18' title='Excluir'></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
    <?php
} else {
    echo "<div class='container alert alert-danger'>Não existem estudantes com a pesquisa informada!</div>";
}
include 'rodape.php';?>
