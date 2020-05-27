<?php

class NotFound
{

	public static function content()
	{
		$data = [
			"url" => Flight::request()->url,
		];

		Flight::view()->display('notFound.twig', $data);
	}
}

Flight::map('notFound', array('NotFound', 'content'));