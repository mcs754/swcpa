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
        $sql = "insert into aluno (id_arquivo_morto, num_aluno, cpf_aluno, nome_aluno, nome_mae_aluno, observacao_aluno)values(:id_arquivo_morto, :num_aluno, :cpf_aluno, :nome_aluno, :nome_mae_aluno, :observacao_aluno)";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":id_arquivo_morto", $aluno->getIdArquivoMorto());
            $i->bindValue(":num_aluno", $aluno->getNumAluno());
            $i->bindValue(":cpf_aluno", $aluno->getCpfAluno());
            $i->bindValue(":nome_aluno", $aluno->getNomeAluno());
            $i->bindValue(":nome_mae_aluno", $aluno->getNomeMaeAluno());
            $i->bindValue(":observacao_aluno", $aluno->getObservacaoAluno());
            $i->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }
}
