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

    public function pesquisar(){
        $sql = "select arquivo_morto.id_arquivo_morto, arquivo_morto.nome_arquivo_morto from arquivo_morto order by arquivo_morto.nome_arquivo_morto;";
        try{
            $a = $this->conexao->prepare($sql);
            $a->execute();
            return $a->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Arquivo");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }


    public function contarAlunos($arquivo){
        $sql = "select count(id_aluno) as num_estudantes from aluno inner join arquivo_morto on aluno.id_arquivo_morto = arquivo_morto.id_arquivo_morto where arquivo_morto.id_arquivo_morto = :id_arquivo_morto;";
        try{
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_arquivo_morto", $arquivo->getIdArquivoMorto());
            $a->execute();
            return $a->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Arquivo");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function excluir($arquivo){
        $sql = "delete from arquivo_morto where id_arquivo_morto = :id_arquivo_morto";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_arquivo_morto", $arquivo->getIdArquivoMorto());
            $a->execute();
            return true;
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function alterar($arquivo){
        $sql = "update arquivo_morto set nome_arquivo_morto = :nome_arquivo_morto where arquivo_morto.id_arquivo_morto = :id_arquivo_morto";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":nome_arquivo_morto", $arquivo->getNomeArquivoMorto());
            $a->bindValue(":id_arquivo_morto", $arquivo->getIdArquivoMorto());
            $a->execute();
            return true;
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function pesquisarUm($arquivo){
        $sql = "select * from arquivo_morto where arquivo_morto.id_arquivo_morto = :id_arquivo_morto";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_arquivo_morto", $arquivo->getIdArquivoMorto());
            $a->execute();
            return $a->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
}
