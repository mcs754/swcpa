<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 10/12/2018
 * Time: 12:20
 */

namespace App\Helper;


class Cpf {
    public static function get($var) {
        $cpf = str_pad(ereg_replace('[^0-9]', '', $var), 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) != 11 || self::contarRepetidos($cpf)) {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    public static function contarRepetidos($valor) {
        foreach (count_chars($valor, 1) as $i => $qtdInstancias) {
            if ($qtdInstancias == 11) {
                return false;
            } else {
                return true;
            }
        }
    }
}
