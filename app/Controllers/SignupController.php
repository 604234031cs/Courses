<?php

namespace App\Controllers;

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
                $user_model  = new Users();
                $data = [
                    'name' => $this->request->getVar('name'),
                    'lastname' => $this->request->getVar('lastname'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'status' => '1'
                ];
                $session->setFlashdata('msg','ลงทะเบียนเรียบร้อยแล้ว');
                $user_model->save($data);
                return redirect()->to('/');
                // echo strlen($data['password']);
            } else {
                echo $this->validator->listErrors();
            }
        }
    }
}
