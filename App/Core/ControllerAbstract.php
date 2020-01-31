<?php

namespace App\Core;

abstract class ControllerAbstract implements ControllerInterface
{

    public function render(String $path, $content = null)
    {
        $require =  'Template/' . $path . '.phtml' ;
        include 'Template/layout/layout.phtml' ;

        return $this;
    }


}