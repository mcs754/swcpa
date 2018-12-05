<?php
$titulo = "Pesquisar estudante";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Pesquisar estudante</h1>
</div>
<?php
if (isset($_GET['msg']) && $_GET['msg'] == 1)
    echo "<div class='alert alert-success'>Estudante excluído com sucesso!</div>";
if (isset($_GET['msg']) && $_GET['msg'] == 2)
    echo "<div class='alert alert-success'>Estudante alterado com sucesso!</div>";
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
    <table class='table-sm table-bordered table-condensed table-striped table-hover'>
        <tr class='text-center'>
            <th>Arquivo</th>
            <th>Pasta</th>
            <th>CPF</th>
            <th class="text-left">Nome</th>
            <th class="text-left">Nome da mãe</th>
            <th class="text-left">Observação</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($alunos as $aluno){
            echo "<tr class='text-center'>";
            echo "<th>A</th>";
            echo "<th>{$aluno->getNumAluno()}</th>";
            echo "<td>{$aluno->getCpfAluno()}</td>";
            echo "<td class='text-left'>{$aluno->getNomeAluno()}</td>";
            echo "<td class='text-left'>{$aluno->getNomeMaeAluno()}</td>";
            echo "<td class='text-left'>{$aluno->getObservacaoAluno()}</td>";
            echo "<td><a class='btn-sm btn-warning' href=#'>Alterar</a></td>";
            echo "<td><a class='btn-sm btn-danger' href=#'><span class='glyphicon glyphicon-trash'></span>Excluir</a></td>";
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
    echo "<div class='alert alert-danger'>Não existem estudantes com a pesquisa informada!</div>";
}
include 'rodape.php';?>
