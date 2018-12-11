<?php
$titulo = "Pesquisar arquivos";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Lista de todas as pastas de arquivo morto cadastradas</h1>
</div>
<div class="container">
    <div class="alert alert-danger" role="alert">
        A exclusão de um arquivo morto excluirá todos as pastas de estudantes vinculadas!
    </div>
<?php
$arq = new \App\Model\Arquivo();
isset($_GET['nome_arquivo_morto']) ? $arq->setNomeArquivoMorto($_GET['nome_arquivo_morto']) : $arq->setNomeArquivoMorto("");
$aDAO = new \App\DAO\ArquivoDAO();
$arquivos = $aDAO->pesquisarArquivos($arq);
if (count($arquivos) > 0) {
?>
    <div class="table-responsive-sm align-items-center">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Arquivo</th>
                <th colspan="2">Ações</th>
            </tr>
            </thead>
            <?php
            foreach ($arquivos as $arquivo) {
                echo "<tbody>";
                echo "<tr class='text-center'>";
                echo "<td scope='row'>{$arquivo->getIdArquivoMorto()}</td>";
                echo "<td class='text-capitalize'>{$arquivo->getNomeArquivoMorto()}</td>";
                echo "<td><a href='#'={$arquivo->getIdArquivoMorto()}'><img src='/Imagens/edit_3994420.png' width='18' heght='18' title='Alterar'></a></td>";
                echo "<td><a href='#'={$arquivo->getIdArquivoMorto()}'><img src='/Imagens/delete_3994410.png' width='18' heght='18' title='Excluir'></a></td>";
                echo "</tr>";
                echo "</tbody>";
            }
            ?>
        </table>
    </div>
</div>
<?php
} else {
    echo "<div class='container alert alert-danger'>Não existem estudantes com a pesquisa informada!</div>";
}
include 'rodape.php'; ?>
