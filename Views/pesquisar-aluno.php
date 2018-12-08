<?php
$titulo = "Pesquisar estudante";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Pesquisar estudante</h1>
</div>
<div class="container">
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == 1)
        echo "<div class='form-group alert alert-success'>Estudante excluído com sucesso!</div>";
    if (isset($_GET['msg']) && $_GET['msg'] == 2)
        echo "<div class='form-group alert alert-success'>Estudante alterado com sucesso!</div>";
    $a = new \App\Model\Aluno();
    isset($_GET['parametro']) ? $a->setCpfAluno($_GET['parametro']) : $a->setCpfAluno("") ? $a->setNomeAluno($_GET['parametro']) : $a->setNomeAluno("") ? $a->setNomeMaeAluno($_GET['parametro']) : $a->setNomeMaeAluno("");
    $aDAO = new \App\DAO\AlunoDAO();
    $alunos = $aDAO->pesquisar($a);
    if (count($alunos) > 0) {
    ?>
    <table class='table-sm table-bordered table-condensed table-striped table-hover'>
        <tr class='text-center'>
            <th width="10">Arquivo</th>
            <th width="10">CPF</th>
            <th width="30">Nascimento</th>
            <th width="300" class="text-left">Nome</th>
            <th width="300" class="text-left">Mãe</th>
            <th width="300" class="text-left">Observação</th>
            <th width="5"></th>
            <th width="5"></th>
        </tr>
        <?php
        foreach ($alunos as $aluno) {
            echo "<tr class='text-center'>";
            echo "<td>{$aluno->getNomeArquivoMorto()}-{$aluno->getNumAluno()}</td>";
            echo "<td>{$aluno->getCpfAluno()}</td>";
            echo "<td>" . \App\Helper\Data::get($aluno->getDataNascimentoAluno()) . "</td>";
            echo "<td class='text-left text-capitalize'>{$aluno->getNomeAluno()}</td>";
            echo "<td class='text-left text-capitalize'>{$aluno->getNomeMaeAluno()}</td>";
            echo "<td class='text-left text-lowercase'>{$aluno->getObservacaoAluno()}</td>";
            echo "<td><a href='aluno-alterar.php?id_aluno={$aluno->getIdAluno()}'><img src='/Imagens/edit_3994420.png' width='18' heght='18' title='Alterar'></a></td>";
            echo "<td><a href='aluno-excluir.php?id_aluno={$aluno->getIdAluno()}'><img src='/Imagens/delete_3994410.png' width='18' heght='18' title='Excluir'></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<?php
} else {
    echo "<div class='container alert alert-danger'>Não existem estudantes com a pesquisa informada!</div>";
}
include 'rodape.php'; ?>

