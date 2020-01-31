<?php

namespace App\Core;

abstract class ControllerAbstract implements ControllerInterface
{

    private $title = null;
    private $charset = null;
    private $styles = array();


    public function render(String $path, $content = null)
    {
        $require =  'Template/' . $path . '.phtml' ;
        include 'Template/layout/layout.phtml' ;

    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }


    public function setCharset($charset)
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null
     */
    public function getCharset()
    {
        return $this->charset;
    }

    public function addStyle( String $path)
    {
        array_push($this->styles, 'Assets'. DS . 'CSS'. DS . $path);
        return $this;
    }

    /**
     * @return array
     */
    public function getStyles(): array
    {
        return $this->styles;
    }


    public function getJs($path)
    {
        $link = 'Assets' . DS . 'JS' . DS . $path . '.js';
        require $link;
    }



}