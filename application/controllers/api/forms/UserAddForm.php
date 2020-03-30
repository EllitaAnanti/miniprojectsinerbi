<?php

namespace application\controllers\api\forms;

class UserAddForm extends BaseForm
{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'id',
                'label' => 'ID Pengguna',
                'value' => guidv4(),
                'validate' => true
            ],
            [
                'name' => 'full_name',
                'label' => 'Fullname',
                'value' => value_from_request($request, 'fullname'),
                'validate' => true
            ],
            [
                'name' => 'email',
                'label' => 'Email',
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