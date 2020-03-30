<?php

namespace application\controllers\api\forms;

class UserEditForm extends BaseForm
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
                'name' => 'profile_image_url',
                'label' => 'Profile Image Url',
                'value' => value_from_request($request, 'profile_image_url'),
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
            ],
            [
                'name' => 'fullname',
                'label' => 'Nama Pengguna',
                'value' => value_from_request($request, 'fullname'),
                'validate' => true
            ],
            [
                'name' => 'nickname',
                'label' => 'Nama Panggilan Pengguna',
                'value' => value_from_request($request, 'nickname'),
                'validate' => true
            ],
            [
                'name' => 'birth_date',
                'label' => 'Ulang Tahun Pengguna',
                'value' => value_from_request($request, 'birth_date'),
                'validate' => true
            ],
            [
                'name' => 'city',
                'label' => 'Kota Pengguna',
                'value' => value_from_request($request, 'city'),
                'validate' => true
            ],
            [
                'name' => 'phone_number',
                'label' => 'Nomo Telepon Pengguna',
                'value' => value_from_request($request, 'phone_number'),
                'validate' => true
            ],
            [
                'name' => 'address',
                'label' => 'Alamat Pengguna',
                'value' => value_from_request($request, 'address'),
                'validate' => true
            ],
            [
                'name' => 'hobby',
                'label' => 'Hobi Pengguna',
                'value' => value_from_request($request, 'hobby'),
                'validate' => true
            ],
            [
                'name' => 'about',
                'label' => 'Tentang Pengguna',
                'value' => value_from_request($request, 'about'),
                'validate' => true
            ],
            
            
        ];
    }
}
