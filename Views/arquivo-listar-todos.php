<?php
$titulo = "Listar arquivos";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Lista de todas as pastas de arquivo morto cadastradas</h1>
</div>
<div class="container">
    <div class="text-center alert alert-danger" role="alert">
        <h5 class="mb-0 alert-heading">Atenção!</h5>
        <p class="mb-0">A exclusão de uma pasta de arquivo morto irá apagar todas as pastas de estudantes vinculadas!</p>
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
                <th>Nome</th>
                <!--<th>Pastas</th>-->
                <th colspan="3">Ações</th>
            </tr>
            </thead>
            <?php
            foreach ($arquivos as $arquivo) {
                echo "<tr class='text-center'>";
                echo "<td scope='row'>{$arquivo->getIdArquivoMorto()}</td>";
                echo "<td>Arquivo - <b>{$arquivo->getNomeArquivoMorto()}</b></td>";
                //echo "<td style='border-left: none;'>{$arquivo->getNumEstudantes()}</td>";
                echo "<td><a href='arquivo-alterar.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}'><img src='/Imagens/edit_3994420.png' width='18' heght='18' title='Alterar'></a></td>";
                echo "<td><a href='arquivo-excluir.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}'><img src='/Imagens/delete_3994410.png' width='18' heght='18' title='Excluir'></a></td>";
                echo "<td><a href='#'{$arquivo->getIdArquivoMorto()}'><img src='/Imagens/print_3994410.png' width='20' heght='20' title='Imprimir'></a></td>";
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
