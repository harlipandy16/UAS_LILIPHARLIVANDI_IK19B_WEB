<?php

namespace App\Controllers;

class Home extends BaseController
{
	 public function __construct() {

        $this->cek_login();
        
    }
    
	public function index()
	{
		if($this->cek_login() == FALSE){
			session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
			return redirect()->to('/auth/login');
		}
		return view('welcome_message');
	}
}
