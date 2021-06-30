<?php namespace App\Controllers;

use App\Models\Dashboard_model;
use App\Models\Transaction_model;

class Dashboard extends BaseController
{
	public function __construct()
    {
		$this->cek_login();
		$this->transaction_model = new Transaction_model();
		$this->dashboard_model = new Dashboard_model();
	}
	
	public function index()
	{
		if($this->cek_login() == FALSE){
			session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
			return redirect()->to('/auth/login');
		}
		// $data['total_transaction']	= $this->dashboard_model->getCountTrx();
		// $data['total_product']		= $this->dashboard_model->getCountProduct();
		// $data['total_category']		= $this->dashboard_model->getCountCategory();
		// $data['total_user']			= $this->dashboard_model->getCountUser();
		// $data['latest_trx']			= $this->dashboard_model->getLatestTrx();

		// $chart['grafik']			= $this->dashboard_model->getGrafik();
		// $data['get_grafik']			= count($chart['grafik']);
		// dd(count($this->dashboard_model->getGrafik()));

		$data['data_transaction'] = $this->transaction_model->getTransaction();
		// echo "<pre>";
		// print_r($data['data_transaction']);
		// die();

		echo view('dashboard', $data);
		echo view('_partials/footer', $chart);
    }

    public function detail_order($id = 0) {
    	if($this->cek_login() == FALSE){
			session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
			return redirect()->to('/auth/login');
		}
		$data['data_transaction'] = $this->transaction_model->getTransaction($id);
		$data['my_order'] = $this->transaction_model->listMyOrder($id);

		// echo "<pre>";
		// print_r($data['my_order']);
		// die();

		echo view('detail_order/index', $data);
    }
    
}