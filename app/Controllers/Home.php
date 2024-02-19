<?php

namespace App\Controllers;
use App\Models\Loginmodel;
class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    
    public function login()
    {
        $session = \CodeIgniter\Config\Services::session();
        $model = new Loginmodel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');  
        $sessiondata = $model->checkLogin($email, $password);
       if ($sessiondata) {
        if ($sessiondata->role === 'Admin') {
            return redirect()->to('AdminDashboard');
        } else if ($sessiondata['role'] === 'Employee') {
            return redirect()->to('Employeedashboard');
        }
    } else {
        $session->setFlashdata('errormessage', 'Invalid .');       
        return redirect()->to('/');
    }
    }
    
}
