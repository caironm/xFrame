<?php

use Src\Core\Todo\Read;

class TodoIndex
{

        public static function content()
        {
                $g = new Read;
                $get = $g->ReadAll();

                print_r($get);

        }
}

Flight::route('/todo', array('TodoIndex', 'content'));