<?php

namespace Src\Core\Todo;

use Src\Support\Connect;

class Read 
{
    protected $result;

    function ReadAll() 
    {
        $database = new Connect;
        $db = $database->MySql();
        $this->result = $db->select("todo", "*");
        
        return $this->result;
    }
}