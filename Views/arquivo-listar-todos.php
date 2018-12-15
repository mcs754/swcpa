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
        <strong>Atenção!</strong> A exclusão de uma pasta de arquivo morto irá apagar todas as pastas de estudantes vinculadas!
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
                <th colspan="3">Ações</th>
            </tr>
            </thead>
            <?php
            foreach ($arquivos as $arquivo) {
                echo "<tr class='text-center'>";
                echo "<td scope='row'>{$arquivo->getIdArquivoMorto()}</td>";
                echo "<td>Pasta {$arquivo->getNomeArquivoMorto()}</td>";
                echo "<td><a href='arquivo-alterar.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}'><i class='fa fa-edit' title='Alterar'></i></a></td>";
                echo "<td><a onclick='confirmar()' href='arquivo-excluir.php?id_arquivo_morto={$arquivo->getIdArquivoMorto()}'><i class='fa fa-trash-alt' title='Excluir'></i></a></td>";
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
<script language ="JavaScript">
    function confirmar(){
        if (!confirm ("Deseja realmente excluir esse registro?"))
            return false;
        else
            return true;
    }
</script>

<div class="modal fade" id="confirmaExcluir" tabindex="-1" role="dialog" aria-labelledby="confirmaExcluir" aria-hidden="true" data-toggle='modal' data-target='#confirmaExcluir'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmaExcluir">Confirmar exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir essa pasta de arquivo morto?<br>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal"><i class="fas fa-ban"></i> Cancelar</button>
                </div>
                <div class="container">
                    <button type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-trash-alt"></i> Excluir</button>
                </div>
            </div>
        </div>
    </div>
</div>
