<?php

namespace App\Controllers;

use App\Models\Regis;
use App\Models\Users;

class SignupController extends BaseController
{
    public function signup()
    {

        $data = [];
        $session = session();
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|is_unique[users.username]',
                'name' => 'required',
                'lastname' => 'required',
                'password' => 'required|min_length[6]',
                'comfirm_pass' => 'matches[password]',
            ];
            // $this->validate($rules);

            if ($this->validate($rules)) {
                $user_model  = new Regis();
                $data = [
                    'r_name' => $this->request->getVar('name'),
                    'r_lastname' => $this->request->getVar('lastname'),
                    'r_username' => $this->request->getVar('username'),
                    'r_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

                ];
                $session->setFlashdata('msg', 'รอการอนุมัติการใช้งาน');
                $user_model->save($data);
                return redirect()->to('/login');
                // echo strlen($data['password']);
            } else {
                echo $this->validator->listErrors();
            }
        }
    }
}
