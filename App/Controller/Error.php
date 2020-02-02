<?php


namespace App\Controller;


use App\Core\ControllerAbstract;

class Error extends ControllerAbstract
{

    public function showError(int $httpCode, String $message = '')
    {

        $this->addStyle('error.css')
            ->render('error', [
                'error' => $httpCode,
                'message' => $message,
                'no-footer' => true,
            ]);

        http_response_code($httpCode);
    }

}