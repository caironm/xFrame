<?php

namespace Src\Support;

class Routs {
    public $rote;
    public $rotes;
    public $path = "app/Controllers";
        
    function __construct($rote) {
        if($rote == "/")
            $rote = "/index";
        $this->rote = $rote;
        $this->rotes = explode("/", $this->rote);
        self::findRoute();
    }
    
    function findRoute() {
        if (is_dir($this->path.'/'.$this->rotes[1])) {
            if(count($this->rotes) > 1) {
                if (!isset($this->rotes[3])) {
                    if (file_exists($this->path.'/'.$this->rotes[1].'/index.php')) {
                        include_once $this->path.'/'.$this->rotes[1].'/index.php';
                    }
                }
                elseif (file_exists($this->path.'/'.$this->rotes[1].'/'.$this->rotes[2].'.php')) {
                    include_once $this->path.'/'.$this->rotes[1].'/'.$this->rotes[2].'.php';
                }
            }
            else {
                if(file_exists($this->path.'/'.$this->rotes[1].'/index.php')) {
                    include_once $this->path.'/'.$this->rotes[1].'/index.php';
                }
            }
        }
        
        if(isset($this->rotes[2])) {
            if (is_dir($this->path.'/'.$this->rotes[1].'/'.$this->rotes[2])){
                if (file_exists($this->path.'/'.$this->rotes[1].'/'.$this->rotes[2].'/index.php')) {
                    include_once $this->path.'/'.$this->rotes[1].'/'.$this->rotes[2].'/index.php';
                }
                else {
                    include_once $this->path.'/'.$this->rotes[1].'/'.$this->rotes[2].'/'.$this->rotes[3].'.php';
                }
            }
        }
        
        if (file_exists($this->path.'/'.$this->rotes[1].'.php')) {
            include_once $this->path.'/'.$this->rotes[1].'.php';
        }	
    }
        
}
