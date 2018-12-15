<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="/Imagens/favicon.png"/>
    <link rel="stylesheet" href="/Vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="/estilo.css">
    <title>Imprimir</title>
</head>
<body>
<?php
include '../vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
$arq = new \App\Model\Arquivo();
isset($_GET) ? $arq->setIdArquivoMorto($_GET['id_arquivo_morto']) : $arq->setIdArquivoMorto($_POST['id_arquivo_morto']);
$arqDAO = new \App\DAO\ArquivoDAO();
$arquivo = $arqDAO->pesquisarUm($arq);
?>
<div class="container"><hr>
    <div class="row">
        <div class="col-sm-10">
            <h3>Arquivo morto <?php echo $arquivo['nome_arquivo_morto']; ?></h3>
        </div>
        <div class="col-sm-2 d-print-none">
            <button type="button" class="btn btn-block btn-sm btn-light" id="btn" onclick="window.print()">
                <i class="fa fa-print"></i> <b>Imprimir</b>
            </button>
        </div>
    </div><br>
    <div class="table-responsive-sm align-items-center">
        <table class="table table-sm table-bordered">
            <thead>
            <tr class="text-center">
                <th>Núm.</th>
                <th>CPF</th>
                <th>Nascimento</th>
                <th class="text-left">Nome</th>
                <th class="text-left">Mãe</th>
                <th class="text-left">Observação</th>
            </tr>
            </thead>
            <?php
            $a = new \App\Model\Aluno();
            isset($_GET) ? $a->setIdArquivoMorto($_GET['id_arquivo_morto']) : $a->setIdArquivoMorto($_POST['id_arquivo_morto']);
            $aDAO = new \App\DAO\AlunoDAO();
            $alunos = $aDAO->pesquisarImprimir($a);
            if (count($alunos) > 0) {
                foreach ($alunos as $aluno) {
                    echo "<tr class='text-center'>";
                    echo "<td>{$aluno->getNumAluno()}</td>";
                    echo "<td>{$aluno->getCpfAluno()}</td>";
                    echo "<td>" . \App\Helper\Data::get($aluno->getDataNascimentoAluno()) . "</td>";
                    echo "<td class='text-left text-capitalize'>{$aluno->getNomeAluno()}</td>";
                    echo "<td class='text-left text-capitalize'>{$aluno->getNomeMaeAluno()}</td>";
                    echo "<td class='text-left text-lowercase'>{$aluno->getObservacaoAluno()}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>
