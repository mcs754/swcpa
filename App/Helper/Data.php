<?php
/**
 * Created by PhpStorm.
 * User: S3
 * Date: 05/12/2018
 * Time: 10:08
 */

namespace App\Helper;


class Data {
    static public function get($data)
    {
        if (!empty($data))
            return date("d/m/Y", strtotime($data));
        else return "";
    }

    static public function set($data)
    {
        $data = str_replace('/', '-', $data);
        return date("Y-m-d", strtotime($data));
    }
}
