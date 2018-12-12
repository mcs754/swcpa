<?php
/**
 * Created by PhpStorm.
 * User: S3
 * Date: 12/12/2018
 * Time: 11:48
 */
include '../Vendor/autoload.php';
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
$a = new \App\Model\Arquivo();
$a->setIdArquivoMorto($_GET['id_arquivo_morto']);
$aDAO = new \App\DAO\ArquivoDAO();
if ($aDAO->excluir($a))
    header("Location:aluno-listar-todos.php?msg=1");