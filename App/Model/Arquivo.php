<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 27/11/2018
 * Time: 00:17
 */

namespace App\Model;


class Arquivo {
    private $id_arquivo_morto;
    private $nome_arquivo_morto;
    private $num_estudantes;

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
    public function getNumEstudantes()
    {
        return $this->num_estudantes;
    }

    /**
     * @param mixed $num_estudantes
     */
    public function setNumEstudantes($num_estudantes)
    {
        $this->num_estudantes = $num_estudantes;
    }
}
