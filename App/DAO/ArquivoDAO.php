<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 27/11/2018
 * Time: 00:17
 */

namespace App\DAO;


class ArquivoDAO extends Conexao {
    public function inserir($arquivo){
        $sql = "insert into arquivo_morto (nome_arquivo_morto) values (:nome_arquivo_morto)";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":nome_arquivo_morto", $arquivo->getNomeArquivoMorto());
            $i->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    /*public function pesquisarArquivos($arquivo_morto = null){
        $sql = "select * from arquivo_morto order by nome_arquivo_morto";
        try{
            $p = $this->conexao->prepare($sql);
            $p->execute();
            return $p->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Arquivo");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }*/

    public function pesquisarArquivos($arquivo_morto){
        $sql = "select * from arquivo_morto order by nome_arquivo_morto";
        try{
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":nome_arquivo_morto", $arquivo_morto->getNomeArquivoMorto());
            $a->execute();
            return $a->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Arquivo");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
}

