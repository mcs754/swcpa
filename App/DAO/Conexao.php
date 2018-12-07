<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 25/11/2018
 * Time: 18:16
 */

namespace App\DAO;

class Conexao {
    protected $conexao;
    private $database = "db_swcpa";
    private $host = "localhost";
    private $user = "root";
    private $senha = "Suporte99";
    public function __construct() {
        $this->conexao = new \PDO("mysql:dbname={$this->database}; host={$this->host}", "{$this->user}", "{$this->senha}");
        $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
