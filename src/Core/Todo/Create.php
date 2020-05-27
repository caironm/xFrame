<?php

namespace Src\Core\Todo;

use Src\Support\Connect;

class Create 
{
    protected $result;
    protected $name;

    function Insert($name) 
    {
        $this->name = $name;
        $database = new Connect;
        $db = $database->MySql();
        $this->result = $db->insert("todo", [
            "name" => $this->name
        ]);
        return $this->result;
    }
}