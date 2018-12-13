<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 26/11/2018
 * Time: 20:38
 */

namespace App\DAO;


class AlunoDAO extends Conexao
{
    public function inserir($aluno)
    {
        $sql = "insert into aluno (id_arquivo_morto, num_aluno, cpf_aluno, data_nascimento_aluno, nome_aluno, nome_mae_aluno, observacao_aluno)values(:id_arquivo_morto, :num_aluno, :cpf_aluno, :data_nascimento_aluno, :nome_aluno, :nome_mae_aluno, :observacao_aluno)";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_arquivo_morto", $aluno->getIdArquivoMorto());
            $a->bindValue(":num_aluno", $aluno->getNumAluno());
            $a->bindValue(":cpf_aluno", $aluno->getCpfAluno());
            $a->bindValue(":data_nascimento_aluno", $aluno->getDataNascimentoAluno());
            $a->bindValue(":nome_aluno", $aluno->getNomeAluno());
            $a->bindValue(":nome_mae_aluno", $aluno->getNomeMaeAluno());
            $a->bindValue(":observacao_aluno", $aluno->getObservacaoAluno());
            $a->execute();
            return true;
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }

    public function pesquisar($aluno)
    {
        $sql = "select nome_arquivo_morto, id_aluno, num_aluno, cpf_aluno, data_nascimento_aluno, nome_aluno, nome_mae_aluno, observacao_aluno from arquivo_morto inner join aluno on arquivo_morto.id_arquivo_morto = aluno.id_arquivo_morto where nome_aluno like :nome_aluno order by nome_arquivo_morto, num_aluno";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":nome_aluno", "%" . $aluno->getNomeAluno() . "%");
            $a->execute();
            return $a->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Aluno");
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function excluir($aluno)
    {
        $sql = "delete from aluno where id_aluno = :id_aluno";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_aluno", $aluno->getIdAluno());
            $a->execute();
            return true;
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function alterar($aluno)
    {
        $sql = "update aluno set id_arquivo_morto = :id_arquivo_morto, num_aluno = :num_aluno, cpf_aluno = :cpf_aluno, data_nascimento_aluno = :data_nascimento_aluno, nome_aluno = :nome_aluno, nome_mae_aluno = :nome_mae_aluno, observacao_aluno = :observacao_aluno where id_aluno = :id_aluno";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_arquivo_morto", $aluno->getIdArquivoMorto());
            $a->bindValue(":num_aluno", $aluno->getNumAluno());
            $a->bindValue(":cpf_aluno", $aluno->getCpfAluno());
            $a->bindValue(":data_nascimento_aluno", $aluno->getDataNascimentoAluno());
            $a->bindValue(":nome_aluno", $aluno->getNomeAluno());
            $a->bindValue(":nome_mae_aluno", $aluno->getNomeMaeAluno());
            $a->bindValue(":observacao_aluno", $aluno->getObservacaoAluno());
            $a->bindValue(":id_aluno", $aluno->getIdAluno());
            $a->execute();
            return true;
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }


    }

    public function pesquisarUm($aluno)
    {
        $sql = "select * from aluno inner join arquivo_morto on aluno.id_arquivo_morto = arquivo_morto.id_arquivo_morto where id_aluno = :id_aluno ";
        try {
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_aluno", $aluno->getIdAluno());
            $a->execute();
            return $a->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
}
