<?php

namespace application\controllers\api\forms;

class UserLoginForm extends BaseForm
{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'email',
                'label' => 'email',
                'value' => value_from_request($request, 'email'),
                'validate' => true
            ],
            [
                'name' => 'password',
                'label' => 'Password',
                'value' => value_from_request($request, 'password'),
                'validate' => true
            ]
        ];
    }
}
