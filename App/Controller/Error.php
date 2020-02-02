<?php


namespace App\Controller;


use App\Core\ControllerAbstract;

class Error extends ControllerAbstract
{

    public function showError(int $httpCode)
    {

        switch ($httpCode) {
            case 404:
                $this->addStyle('error.css')
                    ->render('error', [
                        'error' => $httpCode,
                        'message' => 'Sorry page notfound',
                        'no-footer' => true,
                    ]);
                break;
        }
    }

}