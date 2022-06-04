<?php
namespace Tinybot\Core;
use Tinybot\Config\Config;

class Core{
    use GetContent,Tools,InlineMethods;
   




    public function __construct()
    {
        $this->init();
    }
    

    

}