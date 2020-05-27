<?php

class SiteContact
{

	public static function content()
	{
		$data = [
            "title" => "<h1>Entre em contato</h1>",
            "number" => "84 999.999.999",
            "email" => "caironm@icloud.com"
		];

		Flight::view()->display('contact.twig', $data);
	}
}

Flight::route('/contact', array('SiteContact', 'content'));
