<?php
$titulo = "Listar estudantes";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Lista de todas as pastas de estudantes cadastradas</h1>
</div>
<div class="container">
<?php
if (isset($_GET['msg']) && $_GET['msg'] == 1)
    echo "<div class='form-group alert alert-success'>Estudante excluído com sucesso!</div>";
if (isset($_GET['msg']) && $_GET['msg'] == 2)
    echo "<div class='form-group alert alert-success'>Estudante alterado com sucesso!</div>";
$a = new \App\Model\Aluno();
$aDAO = new \App\DAO\AlunoDAO();
$alunos = $aDAO->pesquisar($a);
if (count($alunos) > 0) {
    ?>
    <div class="table-responsive-sm align-items-center">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead>
            <tr class="text-center">
                <th>Arquivo</th>
                <th>CPF</th>
                <th>Nascimento</th>
                <th class="text-left">Nome</th>
                <th class="text-left">Mãe</th>
                <th class="text-left">Observação</th>
                <th colspan="2">Ações</th>
            </tr>
            </thead>
            <?php
            foreach ($alunos as $aluno) {
                echo "<tr class='text-center'>";
                echo "<th scope='row'>{$aluno->getNomeArquivoMorto()}-{$aluno->getNumAluno()}</th>";
                echo "<td>{$aluno->getCpfAluno()}</td>";
                echo "<td>" . \App\Helper\Data::get($aluno->getDataNascimentoAluno()) . "</td>";
                echo "<td class='text-left text-capitalize'>{$aluno->getNomeAluno()}</td>";
                echo "<td class='text-left text-capitalize'>{$aluno->getNomeMaeAluno()}</td>";
                echo "<td class='text-left text-lowercase'>{$aluno->getObservacaoAluno()}</td>";
                echo "<td><a href='aluno-alterar-listar.php?id_aluno={$aluno->getIdAluno()}'><i class='fa fa-edit' title='Alterar'></i></a></td>";
                echo "<td><a href='aluno-excluir-listar.php?id_aluno={$aluno->getIdAluno()}' onclick='excluir_registro(event);'><i class='fa fa-trash-alt' title='Excluir'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php
}
include 'rodape.php';
?>
<script>
    function excluir_registro(e) {
        if (!confirm("Deseja realmente excluir?"))
            cancelOperation(event);
    }

    function cancelOperation(e) {
        var evt = e || window.event;
        if (evt.preventDefault())
            evt.preventDefault();
        else
            evt.returnValue = false;
    }
</script>
