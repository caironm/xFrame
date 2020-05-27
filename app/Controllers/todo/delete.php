<?php

use Src\Core\Todo\Delete;

class TodoDelete
{

        public static function content($id_task)
        {
                $g = new Delete;
                $get = $g->DeletebyId($id_task);

                Flight::redirect('/todo');

        }
}

Flight::route('/todo/delete/@id_task', array('TodoDelete', 'content'));