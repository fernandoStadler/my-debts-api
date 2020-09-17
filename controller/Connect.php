<?php

namespace Adocao;

class Connect
{
    public $mysqli;

    function __construct()
    {
        $host="db4free.net";
        $user="nandostadler";
        $password="sheldon1408";
        $dataBase="ongpetz";

        $this->mysqli = new \MySQLi($host, $user, $password, $dataBase);
        $this->mysqli->set_charset('utf8');
        $this->mysqli->query("SET time_zone = '-3:00'");
    }

    public function query($query)
    {
        if(!$result = $this->mysqli->query($query)) die($this->mysqli->error);

        return $result;
    }

}