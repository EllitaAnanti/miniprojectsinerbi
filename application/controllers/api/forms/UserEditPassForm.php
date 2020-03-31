<?php

namespace application\controllers\api\forms;

class UserEditPassForm extends BaseForm
{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'id',
                'label' => 'ID Pengguna',
                'value' => value_from_request($request, 'id'),
                'validate' => true
            ],
            [
                'name' => 'password_lama',
                'label' => 'Password Lama',
                'value' => value_from_request($request, 'password_lama'),
                'validate' => false
            ],
            [
                'name' => 'password_baru',
                'label' => 'Password Baru',
                'value' => value_from_request($request, 'password_baru'),
                'validate' => false
            ]
			[
                'name' => 'comfirm_password_baru',
                'label' => 'Comfirm Password Baru',
                'value' => value_from_request($request, 'comfirm_password_baru'),
                'validate' => false
            ]
        ];
    }
}
