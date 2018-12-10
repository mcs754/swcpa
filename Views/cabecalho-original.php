<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" type="image/png" href="/Imagens/favicon.png"/>
<link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="/estilo.css">
<title><?php echo $titulo; ?></title>
</head>
<?php
include '../vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <div class="container">
        <a title="Home" href="index.php"><img src="/Imagens/bg_swcpa.png"></a>
        <ul class="navbar-nav">
            <li class="nav-item mr-sm-5">
                <a href="arquivo-cadastrar.php" class="nav-link">Cadastrar arquivo</a>
            </li>
            <li class="nav-item mr-sm-5">
                <a href="aluno-cadastrar.php" class="nav-link">Cadastrar estudante</a>
            </li>
            <li class="nav-item mr-sm-5">
                <a href="saiba-mais.php" class="nav-link">Saiba mais</a>
            </li>
        </ul>
        <form class="form-inline" action="aluno-pesquisar.php" method="get">
            <input id="nome_aluno" name="nome_aluno" class="form-control mr-sm-2" type="text" placeholder="Pesquisar estudante" autofocus/>
            <input alt="submit" title="Pesquisar" type=image src="/Imagens/search_3994401.png" width="35" height="35"/>
        </form>
        <a class="navbar-nav nav-item " title='Sair' href="logoff.php"><img src='/Imagens/logout_3994458.png' width="32" height="32"></a>
    </div>
</nav>