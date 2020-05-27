<?php

class SiteHome
{

	public static function content()
	{
		$data = [
			"name" => 'Hello World'
		];

		$data = array_merge($data, FILES_LOCATE, ABOUT_APP);

		Flight::view()->display('index.twig', $data);
	}
}

Flight::route('/', array('SiteHome', 'content'));
