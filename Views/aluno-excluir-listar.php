<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 04/12/2018
 * Time: 23:30
 */
include '../Vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
$a = new \App\Model\Aluno();
$a->setIdAluno($_GET['id_aluno']);
$aDAO = new \App\DAO\AlunoDAO();
if ($aDAO->excluir($a))
    header("Location:aluno-listar-todos.php?msg=1");
