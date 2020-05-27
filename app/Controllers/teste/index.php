<?php

class TesteIndex
{

	public static function content()
	{
		$data = [
			"name" => 'This is a teste',
		];

		print_r($data);
		print_r(LANGS_TREATMENT);
	}
}

Flight::route('/teste', array('TesteIndex', 'content'));