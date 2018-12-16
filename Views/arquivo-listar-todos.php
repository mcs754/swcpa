<?php
$titulo = "Listar arquivos";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Lista de todas as pastas de arquivo morto cadastradas</h1>
</div>
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Atenção!</strong> A exclusão de uma pasta de arquivo morto irá apagar todas as pastas de estudantes vinculadas.
    </div>
<?php
if (isset($_GET['msg']) && $_GET['msg'] == 1)
    echo "<div class='form-group alert alert-success'>Arquivo morto excluído com sucesso!</div>";
if (isset($_GET['msg']) && $_GET['msg'] == 2)
    echo "<div class='form-group alert alert-success'>Arquivo morto alterado com sucesso!</div>";
$arq = new \App\Model\Arquivo();
$aDAO = new \App\DAO\ArquivoDAO();
$arquivos = $aDAO->pesquisar($arq);
if (count($arquivos) > 0 ){
?>
    <div class="table-responsive-sm align-items-center">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nome arquivo morto</th>
                <th colspan="3">Ações</th>
            </tr>
            </thead>
            <?php
            foreach ($arquivos as $arquivo) {
                echo "<tr class='text-center'>";
                echo "<td scope='row'>{$arquivo->getIdArquivoMorto()}</td>";
                echo "<td>{$arquivo->getNomeArquivoMorto()}</td>";
                echo "<td><a href='arquivo-alterar.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}'><i class='fa fa-edit' title='Alterar'></i></a></td>";
                echo "<td><a href='arquivo-excluir.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}' onclick='excluir_registro(event);'><i class='fa fa-trash-alt' title='Excluir'></i></a></td>";
                echo "<td><a target='_blank' rel='noopener noreferrer' href='arquivo-imprimir.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}'><i class='fa fa-print' title='Imprimir'></i></a></td>";
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
