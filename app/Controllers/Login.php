<?php

namespace App\Controllers;

use App\Models\Users;

class Login extends BaseController
{
    public function login()
    {
        helper(['form']);
        $session = session();
        $model = new Users();
        $username  = $this->request->getVar('username');
        $password  =  $this->request->getVar('password');

        // echo $username;
        // echo $password;

        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];

            $verify_password = password_verify($password, $pass);
            // echo $verify_password;
            if ($verify_password) {

                if ($data['status'] == 0) {
                    $ses_data = [
                        'A_id' => $data['id'],
                        'A_username' => $data['username'],
                        'A_name' => $data['name'],
                        'A_lastname' => $data['lastname'],
                        'A_status' => $data['status'],
                        'logged_in' => true
                    ];
                    $session->set($ses_data);
                    return redirect()->to(base_url('/admin/courses'));
                } else {
                    $ses_data = [
                        'id' => $data['id'],
                        'username' => $data['username'],
                        'name' => $data['name'],
                        'lastname' => $data['lastname'],
                        'status' => $data['status'],
                        'logged_in' => true
                    ];
                    $session->set($ses_data);
                    return redirect()->to(base_url('/'));
                }
            } else {
                $session->setFlashdata('msg', 'Password ไม่ถูกต้อง');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'ไม่พบ username นี้');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('/login'));
    }
}
