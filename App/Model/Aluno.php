<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 26/11/2018
 * Time: 20:31
 */

namespace App\Model;


class Aluno
{
    private $nome_arquivo_morto;
    private $id_aluno;
    private $id_arquivo_morto;
    private $num_aluno;
    private $cpf_aluno;
    private $data_nascimento_aluno;
    private $nome_aluno;
    private $nome_mae_aluno;
    private $observacao_aluno;

    /**
     * @return mixed
     */
    public function getNomeArquivoMorto()
    {
        return $this->nome_arquivo_morto;
    }

    /**
     * @param mixed $nome_arquivo_morto
     */
    public function setNomeArquivoMorto($nome_arquivo_morto)
    {
        $this->nome_arquivo_morto = $nome_arquivo_morto;
    }

    /**
     * @return mixed
     */
    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    /**
     * @param mixed $id_aluno
     */
    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    /**
     * @return mixed
     */
    public function getIdArquivoMorto()
    {
        return $this->id_arquivo_morto;
    }

    /**
     * @param mixed $id_arquivo_morto
     */
    public function setIdArquivoMorto($id_arquivo_morto)
    {
        $this->id_arquivo_morto = $id_arquivo_morto;
    }

    /**
     * @return mixed
     */
    public function getNumAluno()
    {
        return $this->num_aluno;
    }

    /**
     * @param mixed $num_aluno
     */
    public function setNumAluno($num_aluno)
    {
        $this->num_aluno = $num_aluno;
    }

    /**
     * @return mixed
     */
    public function getCpfAluno()
    {
        return $this->cpf_aluno;
    }

    /**
     * @param mixed $cpf_aluno
     */
    public function setCpfAluno($cpf_aluno)
    {
        $this->cpf_aluno = $cpf_aluno;
    }

    /**
     * @return mixed
     */
    public function getDataNascimentoAluno()
    {
        return $this->data_nascimento_aluno;
    }

    /**
     * @param mixed $data_nascimento_aluno
     */
    public function setDataNascimentoAluno($data_nascimento_aluno)
    {
        $this->data_nascimento_aluno = $data_nascimento_aluno;
    }

    /**
     * @return mixed
     */
    public function getNomeAluno()
    {
        return $this->nome_aluno;
    }

    /**
     * @param mixed $nome_aluno
     */
    public function setNomeAluno($nome_aluno)
    {
        $this->nome_aluno = $nome_aluno;
    }

    /**
     * @return mixed
     */
    public function getNomeMaeAluno()
    {
        return $this->nome_mae_aluno;
    }

    /**
     * @param mixed $nome_mae_aluno
     */
    public function setNomeMaeAluno($nome_mae_aluno)
    {
        $this->nome_mae_aluno = $nome_mae_aluno;
    }

    /**
     * @return mixed
     */
    public function getObservacaoAluno()
    {
        return $this->observacao_aluno;
    }

    /**
     * @param mixed $observacao_aluno
     */
    public function setObservacaoAluno($observacao_aluno)
    {
        $this->observacao_aluno = $observacao_aluno;
    }
}
