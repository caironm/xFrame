<?php

use Src\Core\Todo\Update;

class TodoUpdate
{

        public static function content($id_task, $name_task)
        {
                $g = new Update;
                $get = $g->UpdatebyId($id_task, $name_task);

                Flight::redirect('/todo');

        }
}

Flight::route('/todo/update/@id_task/@name_task', array('TodoUpdate', 'content'));