<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="/Imagens/favicon.png" />
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/estilo.css">
    <title>Login swcpa</title>
</head>
<body>
<div class="container">
    <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading"><a href="login.php"><img class="img-login" src="/Imagens/bg-swcpa.png"><br></a><p>Sistema Web para Cadastro de Pastas de Alunos</p></h2>
        <?php
        if ($_POST){
            include '../vendor/autoload.php';
            $u = new \App\Model\Usuario();
            $u->setCpf($_POST['cpf']);
            $u->setSenha($_POST['senha']);
            $uDAO = new \App\DAO\UsuarioDAO();
            if ($uDAO->login($u))
                header("Location: index.php");
            else
                echo "<div class='alert alert-danger text-center info'>Usuário não encontrado ou senha incorreta!</div>";
        }
        ?>
        <div class="alert alert-info text-justify info">Bem vindo ao swcpa. Informe suas credenciais ou contacte o <a href="mailto:mcs754@gmail.com" class="alert-link">administrador</a> para cadastros em geral.</div>

        <label for="cpf" class="sr-only">Cpf</label>
        <input tabindex="2" maxlength="11" inputmode="numeric" type="number" id="cpf" name="cpf" class="form-control" placeholder="CPF (apenas números)" required autofocus>

        <label for="senha" class="sr-only">Password</label>
        <input tabindex="3" type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>

        <button type="submit" tabindex="4" class="btn btn-outline-primary btn-block" ">Autenticar</button>
    </form>
</body>
</html>
