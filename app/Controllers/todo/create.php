<?php

use Src\Core\Todo\Create;

class TodoCreate
{

        public static function content($task)
        {
                $g = new Create;
                $get = $g->Insert($task);

                Flight::redirect('/todo');

        }
}

Flight::route('/todo/create/@task', array('TodoCreate', 'content'));