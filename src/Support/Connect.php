<?php

namespace Src\Support;
use Medoo\Medoo;

class Connect
{
    public $database;
    function MySql() {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => DATA_BASE['name'],
            'server' => DATA_BASE['server'],
            'username' => DATA_BASE['user'],
            'password' => DATA_BASE['pass'],
            'charset' => 'utf8mb4',
	        'collation' => 'utf8mb4_general_ci'
        ]);

        return $this->database;
    }
}