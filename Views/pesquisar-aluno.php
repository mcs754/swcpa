<?php
$titulo = "Pesquisar estudante";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Pesquisar estudante</h1>
</div>
<?php
$a1 = new \App\Model\Aluno();
$a2 = new \App\Model\Aluno();
$a3 = new \App\Model\Aluno();
isset($_GET['cpf_aluno']) ? $a1->setCpfAluno($_GET['cpf_aluno']) : $a1->setCpfAluno("");
isset($_GET['nome_aluno']) ? $a2->setNomeAluno($_GET['nome_aluno']) : $a2->setNomeAluno("");
isset($_GET['nome_mae_aluno']) ? $a3->setNomeMaeAluno($_GET['nome_mae_aluno']) : $a3->setNomeMaeAluno("");
if ($a1 !=""){
    $aDAO = new \App\DAO\AlunoDAO();
    $alunos = $aDAO->pesquisar($a1);
}
elseif ($a2 !=""){
    $aDAO = new \App\DAO\AlunoDAO();
    $alunos = $aDAO->pesquisar($a2);
}
else{
    $aDAO = new \App\DAO\AlunoDAO();
    $alunos = $aDAO->pesquisar($a3);
}
if (count($alunos) > 0) {
?>
<div class="container">
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == 1)
        echo "<div class='form-group alert alert-success'>Estudante excluído com sucesso!</div>";
    if (isset($_GET['msg']) && $_GET['msg'] == 2)
        echo "<div class='form-group alert alert-success'>Estudante alterado com sucesso!</div>";
    ?>
    <table class='table-sm table-bordered table-condensed table-striped table-hover'>
        <tr class='text-center'>
            <th><img src="/Imagens/archive_3994357.png" title="Arquivo"></th>
            <th><img src="/Imagens/directory_3994364.png" title="Pasta"></th>
            <th width="10">CPF</th>
            <th width="30">Nascimento</th>
            <th width="300" class="text-left">Nome</th>
            <th width="300" class="text-left">Mãe</th>
            <th width="300" class="text-left">Observação</th>
            <th width="5"></th>
            <th width="5"></th>
        </tr>
        <?php foreach ($alunos as $aluno){
            echo "<tr class='text-center'>";
            echo "<td class='font-weight-bold'>{$aluno->getIdArquivoMorto()}</td>";
            echo "<td class='font-weight-bold'>{$aluno->getNumAluno()}</td>";
            echo "<td>{$aluno->getCpfAluno()}</td>";
            echo "<td>".\App\Helper\Data::get($aluno->getDataNascimentoAluno())."</td>";
            echo "<td class='text-left text-capitalize'>{$aluno->getNomeAluno()}</td>";
            echo "<td class='text-left text-capitalize'>{$aluno->getNomeMaeAluno()}</td>";
            echo "<td class='text-left text-lowercase'>{$aluno->getObservacaoAluno()}</td>";
            echo "<td><a href='#'><img src='/Imagens/edit_3994420.png' title='Editar'></a></td>";
            echo "<td><a href='aluno-excluir.php'><img src='/Imagens/delete_3994410.png' title='Excluir'></a></td>";

            /*
            echo "<td><a class='btn btn-danger' href='aluno-excluir.php?id={$aluno->getId()}'> Excluir</a></td>";
            echo "<td><a class='btn btn-warning' href='aluno-alterar.php?id={$aluno->getId()}'>Alterar</a></td>";
            */
            echo "</tr>";
        }?>
    </table>
</div>
    <?php
} else {
    echo "<div class='container alert alert-danger'>Não existem estudantes com a pesquisa informada!</div>";
}
include 'rodape.php';?>
