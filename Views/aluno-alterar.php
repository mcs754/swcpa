<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 04/12/2018
 * Time: 23:30
 */
$titulo = "Alteração de estudante";
include 'cabecalho.php';
?>

    <div class="container cabecalho">
        <h1>Alterar estudante</h1>
    </div>

<?php
include '../vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();