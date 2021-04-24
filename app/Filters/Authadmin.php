<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authadmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $session = session();
        if (!session()->get('logged_in')) {
            //     $session->setFlashdata('msg', 'กรุณา Login ก่อนเข้าใช้');
            // echo "BEFORE:=>" . date('H:i:s') . "<br>";
            return redirect()->to(base_url('/login'));
        } else {
            if (!session()->get('A_status') && session()->get('A_status') != null) {
                // echo "OK Admin";
                // echo session()->get('A_status');
                // return redirect()->to(base_url('/courses'));
            } else {
                return redirect()->to('/courses');
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
