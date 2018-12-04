<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 25/11/2018
 * Time: 18:27
 */

namespace App\Model;

class Usuario {
    private $cpf;
    private $senha;

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}
