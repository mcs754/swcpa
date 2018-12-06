<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 26/11/2018
 * Time: 20:38
 */

namespace App\DAO;


class AlunoDAO extends Conexao {
    public function inserir ($aluno){
        $sql = "insert into aluno (id_arquivo_morto, num_aluno, cpf_aluno, data_nascimento_aluno, nome_aluno, nome_mae_aluno, observacao_aluno)values(:id_arquivo_morto, :num_aluno, :cpf_aluno, :data_nascimento_aluno, :nome_aluno, :nome_mae_aluno, :observacao_aluno)";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":id_arquivo_morto", $aluno->getIdArquivoMorto());
            $i->bindValue(":num_aluno", $aluno->getNumAluno());
            $i->bindValue(":cpf_aluno", $aluno->getCpfAluno());
            $i->bindValue(":data_nascimento_aluno", $aluno->getDataNascimentoAluno());
            $i->bindValue(":nome_aluno", $aluno->getNomeAluno());
            $i->bindValue(":nome_mae_aluno", $aluno->getNomeMaeAluno());
            $i->bindValue(":observacao_aluno", $aluno->getObservacaoAluno());
            $i->execute();
            return true;
        }catch (\PDOException $e){
            $e->getMessage();
        }
    }

    public function pesquisar($aluno){
        $sql = "select * from aluno where cpf_aluno = :cpf_aluno or nome_aluno like :nome_aluno or nome_mae_aluno like :nome_mae_aluno";
        try{
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":cpf_aluno", $aluno->getCpfAluno());
            $a->bindValue(":nome_aluno", "%".$aluno->getNomeAluno()."%");
            $a->bindValue(":nome_mae_aluno", "%".$aluno->getNomeMaeAluno()."%");
            $a->execute();
            return $a->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Aluno");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function pesquisarUm($aluno){
        $sql = "select * from aluno where id_aluno = :id_aluno";
        try{
            $a = $this->conexao->prepare($sql);
            $a->bindValue(":id_aluno", $aluno->getIdAluno());
            $a->execute();
            return $a->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    public function excluir($aluno){
        $sql = "delete from aluno where id_aluno = :id_aluno";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":id_aluno", $aluno->getIdAluno());
            $i->execute();
            return true;
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
}
