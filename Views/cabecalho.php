<!doctype html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html"/>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="/Imagens/favicon.png"/>
    <link rel="stylesheet" href="/Vendor/twbs/bootstrap/dist/css/bootstrap.css"/>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"/>-->
    <link rel="stylesheet" href="/Vendor/font-awesome/css/all.css"/>
    <link rel="stylesheet" href="/estilo.css"/>
    <title><?php echo $titulo; ?></title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php
include '../vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container justify-content-between">
        <a class="navbar-brand" title="Tela inicial" href="index.php"><img src="/Imagens/bg_swcpa.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i title="Arquivo morto" class="fas fa-archive"></i> Arquivo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="arquivo-cadastrar.php">Novo cadastro</a>
                        <a class="dropdown-item" href="arquivo-listar-todos.php">Listar todos</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i title="Estudante" class="fas fa-file-alt"></i> Estudante
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="aluno-cadastrar.php">Novo cadastro</a>
                        <a class="dropdown-item" href="aluno-listar-todos.php">Listar todos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="saiba-mais.php"><i title="Saiba mais" class="fas fa-plus-circle"></i> Saiba mais</a>
                </li>
            </ul>
            <form class="col-sm-4 my-1" action="aluno-pesquisar.php" method="get">
                <div class="input-group">
                    <input autofocus id="parametro" name="parametro" class="form-control" type="search" placeholder="Pesquisar estudante" style="border-right: none;">
                    <div class="input-group-append">
                        <div class="input-group-text" style="background-color: #FFF">
                            <input alt="submit" title="Pesquisar" type="image" class="my-2 my-sm-0" src="/Imagens/search_3994401.png" width="24">
                        </div>
                    </div>
                </div>
            </form>
            <span class="navbar-nav nav-item mr-right">
            <a title="Sair" class="nav-link" href="logoff.php">Sair <i class="fa fa-sign-out-alt"></i></a>
            </span>
        </div>
    </div>
</nav>
