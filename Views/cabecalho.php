<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="/Imagens/favicon.png" />
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/estilo.css">
    <title><?php echo $titulo;?></title>
</head>
<body>
<?php
include '../vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <div class="container">
        <a href="index.php"><img src="/Imagens/bg-swcpa.png"></a>
        <ul class="navbar-nav">
            <li class="nav-item mr-sm-5">
                <a href="cadastrar-pasta.php" class="nav-link">Cadastrar arquivo</a>
            </li>
            <li class="nav-item mr-sm-5">
                <a href="cadastrar-aluno.php" class="nav-link">Cadastrar estudante</a>
            </li>
        </ul>
        <form class="form-inline" action="pesquisar-aluno.php" method="get">
            <input id="parametros" class="form-control mr-sm-2" type="search" placeholder="Pesquisar estudante" autofocus/>
            <!--<button type="submit" class="btn btn-outline-secondary">Pesquisar</button>-->
            <input alt="submit" title="Pesquisar" type=image src="/Imagens/search_3994401.png" width="35" height="35"/>
        </form>
        <a class="navbar-nav nav-item " title='Sair' href="logoff.php"><img src='/Imagens/logout_3994458.png' width="32" height="32"></a>
    </div>
</nav>
