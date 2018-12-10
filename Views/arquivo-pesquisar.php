<?php
$titulo = "Pesquisar arquivos";
include 'cabecalho.php';
?>
<div class="container cabecalho">
    <h1>Pesquisar pastas de arquivo morto</h1>
</div>
<form class="container" action="#" method="get">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <input type="search" id="nome_arquivo_morto" name="nome_arquivo_morto" class="form-control" placeholder="Nome do arquivo morto" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-success btn-block">Pesquisar</button>
            </div>
        </div>
    </div>
</form>
