<?php

class SiteHome
{

	public static function content()
	{
		$data = [
			"name" => 'Hello World'
		];

		$data = array_merge($data, FILES_LOCATE);

		Flight::view()->display('index.twig', $data);
	}
}

Flight::route('/', array('SiteHome', 'content'));
