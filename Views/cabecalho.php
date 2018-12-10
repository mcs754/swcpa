<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="/Imagens/favicon.png"/>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/estilo.css">
    <title><?php echo $titulo; ?></title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
include '../vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container justify-content-between">
    <a class="navbar-brand" title="Home" href="index.php"><img src="/Imagens/bg_swcpa.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Arquivo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="arquivo-cadastrar.php">Novo cadastro</a>
                    <a class="dropdown-item" href="arquivo-pesquisar.php">Pesquisa avançada</a>
                    <a class="dropdown-item" href="arquivo-relatorios.php">Relatórios</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Estudante
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="aluno-cadastrar.php">Novo cadastro</a>
                    <a class="dropdown-item" href="aluno-pesquisar-avancado.php">Pesquisa avançada</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="saiba-mais.php">Saiba mais</a>
            </li>
        </ul>
        <span class="navbar-nav nav-item mr-right">
            <a class="nav-link" href="logoff.php">Sair</a>
        </span>
        <form class="form-inline my-2 my-lg-0" action="aluno-pesquisar.php" method="get">
            <input id="nome_aluno" name="nome_aluno" class="form-control mr-sm-2" type="search" placeholder="Nome estudante" autofocus/>
            <input alt="submit" title="Pesquisar" type="image" class="my-2 my-sm-0" src="/Imagens/search_3994401.png" width="35" height="35"/>
        </form>
    </div>
    </div>
</nav>
