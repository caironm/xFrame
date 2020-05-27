<?php
require 'vendor/autoload.php';

use Src\Support\Header;
use Src\Support\Routs;

/* ==================================
    Select the header content
===================================== */
$header = new Header;
$header->uft8();

/* ==================================
    Set twig configurations
===================================== */
$loader = new Twig_Loader_Filesystem(PATHS_LOCATE['views']);
$twigConfig = [
    'cache'    =>    'cache/views',
    'debug'    =>    true
];

Flight::register('view', 'Twig_Environment', [$loader, $twigConfig], function ($twig) {
    $twig->addExtension(new Twig_Extension_Debug());
});

/* ==================================
    Load the routs
===================================== */
$routs = new Routs(Flight::request()->url);

/* ==================================
    Load the rout not found
===================================== */
include_once PATHS_LOCATE['controllers'].'/notFound.php';

/* ==================================
    Start the app
===================================== */
Flight::start();
