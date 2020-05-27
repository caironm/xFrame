<?php

namespace Src\Support;

class Header
{

    function http()
    {
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
        }
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        }

        $_PUT = array();
        if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
            parse_str(file_get_contents('php://input'), $_PUT);
        }

        $_DELETE = array();
        if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
            parse_str(file_get_contents('php://input'), $_DELETE);
        }
    }

    function session()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    function errors()
    {
        $whoops = new \Whoops\Run;
        $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    function lang()
    {
        if (isset($_COOKIE["lang"])) {
            foreach (glob("public/translates/" . $_COOKIE["lang"] . "/*.php") as $filename)
            {
                require_once($filename);
            }
        } else {
            foreach (glob("public/translates/pt-br/*.php") as $filename)
            {
                require_once($filename);
            }
        }
    }

    function config()
    {
        foreach (glob("config/*.php") as $filename)
        {
            require_once($filename);
        }
    }

    function headers()
    {
        ini_set('display_errors', 1); //0 in production
        error_reporting(~0);
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $this->http();
        $this->session();
        $this->errors();
        $this->lang();
        $this->config();
    }

    function uft8()
    {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
        header('Content-type: text/html; charset=uft-8');
        $this->headers();
    }

    function json()
    {
        header("Content-type: application/json; charset=utf-8");
        $this->headers();
    }
}
