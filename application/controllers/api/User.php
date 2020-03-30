<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/forms/BaseForm.php';
require APPPATH . '/controllers/api/Base.php';
require APPPATH . '/controllers/api/forms/UserAddForm.php';
require APPPATH . '/controllers/api/forms/UserEditPassForm.php';
require APPPATH . '/controllers/api/forms/UserLoginForm.php';
require APPPATH . '/controllers/api/forms/UserEditForm.php';

use application\controllers\api\forms\UserAddForm;
use application\controllers\api\forms\UserLoginForm;
use application\controllers\api\forms\UserEditPassForm;
use application\controllers\api\forms\UserEditForm;

class User extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function profile_post()
    {
        $user_data = M_Users::where('id', $this->post('id'))->first();

        if ($user_data == null) {
            return $this->error_response("Data Pengguna Tidak Ditemukan!");
        }

        return $this->success_response($user_data);
    }

    public function register_post()
    {
        $user_form = new UserAddForm($this->post());

        $validate_form = $user_form->validate();

        if ($validate_form != "") {
            return $this->error_response($validate_form);
        }

        $user_data_form = $user_form->convert_form_field();
        
        $user_data_form['created_at'] = now_with_hours();
        $user_data_form['updated_at'] = now_with_hours();

        try {
            $user_create = M_Users::create($user_data_form);
        } catch (\Illuminate\Database\QueryException $e) {
            log_message('error', 'Data email tidak boleh sama');
            return $this->error_response("Data email tidak boleh sama");
        }

        return $this->success_response($user_create);
    }

   
    public function edit_pass_post()
    {
        $user_form = new UserEditPassForm($this->post());

        $validate_form = $user_form->validate();

        if ($validate_form != "") {
            return $this->error_response($validate_form);
        }

        $user_data_form = $user_form->convert_form_field();

        $user_data = M_Users::find($user_data_form['id']);

        if ($user_data == null) {
            return $this->error_response("Pengguna dengan id " . $user_data_form['id'] . " tidak ditemukan!");
        } else {
            if ($user_data_form['password_lama'] == $user_data->password) {

                $user_data_form['password'] = ($user_data_form['password_baru']);
                $user_data_form['updated_at'] = now_with_hours();

                // proses update ke db
                $user_data->update($user_data_form);

                // fungsi ini ada di Base.php
                return $this->success_response($user_data_form);
            } else {
                return $this->error_response("Password salah");
            }
        }
    }

    
    public function login_post()
    {
        $user_form = new UserLoginForm($this->post());

        $email = $this->post('email');
        $password = $this->post('password');

        if (isset($email) && isset($password)) {
            $user_data = M_Users::where('email', $email)->first();

            if ($user_data == null) {
                return $this->error_response("Data tidak ditemukan");
            } else {
                $password_input = $password;
                $password_hash = $user_data->password;
                if ($password_input == $password_hash) {
                    return $this->success_response($user_data);
                } else {
                    return $this->error_response("Periksa kembali email dan password");
                }
            }
        } else {
            return $this->error_response("email dan password tidak boleh kosong");
        }
    }

    /*
        created by: MZ Naufal Maulana
        created date: 21 Februari 2020
        description: api edit user
    */
    public function edit_post()
    {
        $user_form = new UserEditForm($this->post());

        $password = $this->post('password');

        $validate_form = $user_form->validate();

        if ($validate_form != "") {
            log_message('error', $validate_form);
            return $this->error_response($validate_form);
        }

        $user_data_form = $user_form->convert_form_field();

        $user_data = M_Users::find($user_data_form['id']);

        if ($user_data == null) {
            log_message('error', "Pengguna dengan id " . $user_data_form['id'] . " tidak ditemukan!");
            return $this->error_response("Pengguna dengan id " . $user_data_form['id'] . " tidak ditemukan!");
        }


        $user_data_form['password'] = $password;
        $user_data_form['updated_at'] = now_with_hours();

        // proses update ke db
        $user_data->update($user_data_form);

        // fungsi ini ada di Base.php
        return $this->success_response($user_data_form);
    }

}
