<?php

namespace App\Core;

abstract class ControllerAbstract implements ControllerInterface
{

    private $title = null;
    private $charset = null;
    private $styles = array();
    private $customElements = array();

    public function __construct()
    {
        $this->customElements['name'] = array();
    }

    public function verifyMethod(String $method)
    {
        if(!$_SERVER['REQUEST_METHOD'] == $method)
        {
            die('erreur method');
        }

    }

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
        array_push($this->styles,  DS .'PHP-Framework-project'. DS .'Assets'. DS . 'CSS'. DS . $path);
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

    public function __call($method, $arguments) {

        switch ($method) {
            case 'setMeta' :

                array_push($this->customElements['name'], [
                    'name' => $arguments[0],
                    'content' => $arguments[1],
                ]);

                break;
        }

        return $this;
    }

    public function getMeta(): array
    {
        return $this->customElements['name'];
    }

    /**
     * @return array
     */
    public function getCustomElements(): array
    {
        return $this->customElements;
    }


}