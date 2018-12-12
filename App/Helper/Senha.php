<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 26/11/2018
 * Time: 00:12
 */

namespace App\Helper;


class Senha
{
    static public function gerar($senha)
    {
        return md5($senha);
    }
}
