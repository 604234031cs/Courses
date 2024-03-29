<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $session = session();
        if (!session()->get('logged_in')) {
            //     $session->setFlashdata('msg', 'กรุณา Login ก่อนเข้าใช้');
            // echo "BEFORE:=>" . date('H:i:s') . "<br>";
            return redirect()->to(base_url('/login'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // echo "AFTER:=>" . date('H:i:s');
        // Do something here
    }
}
