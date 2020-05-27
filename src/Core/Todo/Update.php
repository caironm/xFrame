<?php

namespace Src\Core\Todo;

use Src\Support\Connect;

class Update 
{
    protected $result;
    protected $id;
    protected $name;

    function UpdatebyId($id, $name) 
    {
        $this->id = $id;
        $this->name = $name;
        $database = new Connect;
        $db = $database->MySql();
        $this->result = $db->update("todo", [
            "name" => $this->name
        ], [
            "id" => $this->id
        ]);
        return $this->result;
    }
}