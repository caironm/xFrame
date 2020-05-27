<?php

namespace Src\Core\Todo;

use Src\Support\Connect;

class Delete 
{
    protected $result;
    protected $id;

    function DeletebyId($id) 
    {
        $this->id = $id;
        $database = new Connect;
        $db = $database->MySql();
        $this->result = $db->delete("todo", [
            "AND" => [
                "id" => $this->id
            ]
        ]);
        return $this->result;
    }

    function DeleteAll() 
    {
        $this->id = $id;
        $database = new Connect;
        $db = $database->MySql();
        $this->result = $db->delete("todo", "*");
        return $this->result;
    }
}