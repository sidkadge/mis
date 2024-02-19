<?php

namespace App\Models;

use CodeIgniter\Model;

class Loginmodel extends Model
{
    protected $table = 'employee_tbl';
    protected $primaryKey = 'Emp_id';
    protected $allowedFields = ['emp_email', 'password', 'role'];

    public function checkLogin($email, $password)
    {
        $result = $this->where('emp_email', $email)->where('password', $password)->get()->getRow();
        // $jsonResult = json_encode($result);

        return $result;
    }
}