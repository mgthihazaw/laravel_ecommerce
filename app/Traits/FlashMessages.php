<?php

namespace App\Traits;

trait FlashMessage
{
    protected $errorMessages = [];
    protected $infoMesssages = [];
    protected $successMessages = [];
    protected $warningMessages = [];

    protected function setMessage($message, $type)
    {
        $model = 'infoMessages';

        switch ($type) {
            case 'info': {
                    $model = 'infoMessages';
                }
                break;
            case 'error': {
                    $model = 'errorMessages';
                }
                break;
            case 'success': {
                    $model = 'successMessages';
                }
                break;
            case 'warning': {
                    $model = 'warningMessages';
                }
                break;
        }
        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->$model, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }
    protected function getFlashMessages()
    {
        return [
            'error' => $this->errorMessages,
            'info' => $this->infoMesssages,
            'success' => $this->successMessages,
            'warning' => $this->warningMessages,
        ];
    }
    protected function showFlashMessages()
    {
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
    }
}