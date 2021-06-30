<?php namespace App\Controllers;
 
use App\Models\Product_model;
use App\Models\Transaction_model;
// memanggil library / package WFcart
use Wildanfuady\WFcart\WFcart;
 
class Cart extends BaseController
{
 
    public function __construct() {

        $this->cek_login();
        $this->transaction_model = new Transaction_model();

        // memanggil product model
        $this->product = new Product_model;
        // membuat variabel untuk menampung class WFcart
        $this->cart = new WFcart();
        // memanggil form helper
        helper('form');
 
    }
 
    public function index()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        // membuat variabel untuk menampung total keranjang belanja
        $data['items'] = $this->cart->totals();
        // menampilkan total belanja dari semua pembelian
        $data['total'] = $this->cart->count_totals();
        // menampilkan halaman view cart
        return view('cart/index', $data);
    }
 
    public function beli($id = null)
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        // cari product berdasarkan id
        $product = $this->product->getProduct($id);
        // cek data product
        if($product != null){ // jika product tidak kosong
 
            // buat variabel array untuk menampung data product
            $item = [
                'product_id'              => $product['product_id'],
                'product_name'            => $product['product_name'],
                'product_price'           => $product['product_price'],
                'product_description'     => $product['product_description'],
                'quantity'                => 1,
                'image_product'           => $product['product_image'],
                'sku'                     => $product['product_sku']
            ];
            // tambahkan product ke dalam cart
            $this->cart->add_cart($id, $item);
            // tampilkan nama product yang ditambahkan
            $product = $item['product_name'];
            // success flashdata
            session()->setFlashdata('success', "Berhasil memasukan {$product} ke karanjang belanja");
        } else {
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/transaction');
    }
 
    // function untuk update cart berdasarkan id dan quantity
    public function update()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        // update cart
        $this->cart->update();
        return redirect()->to('/cart');
    }

    public function order() {

        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        // echo "<pre>";
        // print_r($totalPrice);
        // die();

        // Data Cart
        $dataCart = $this->cart->totals();
        $totalPrice = 0;
        foreach ($dataCart as $key => $cl) {
            $subTotalPrice = intval($cl['product_price']) * intval($cl['quantity']);
            $totalPrice += $subTotalPrice;
        }

        // ======= Random String ======= //
        $characters = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // ======= End Random Sring ===== //

        // Insert To Transaction
        $kode_unik = '#HZS-' . $randomString . '-' .time();

        $configTransaction = [
            'kode_unik' => $kode_unik,
            'total' => $totalPrice,
            'barcode' => null
        ];
        // Get Id Transaction After Save Transaction
        $idTransaction = $this->transaction_model->insertTransaction($configTransaction);

        // Update Barcode
        $date=date_create("2021-06-30 13:15:19");
        $date_format = date_format($date,"d/m/Y H:i:s");
        $barcode = 'Nota: ' . $kode_unik . ' ------ Date: ' . $date_format;
        $this->transaction_model->updateTransaction(['barcode' => $barcode], $idTransaction);

        // Insert To Order
        foreach ($dataCart as $key => $dt) {
            $configOrder = [
                'id_transaksi' => $idTransaction,
                'id_product' => $dt['product_id'],
                'name_product' => $dt['product_name'],
                'price_product' => $dt['product_price'],
                'qty_product' => $dt['quantity'],
                'subtotal' => intval($dt['product_price']) * intval($dt['quantity']),
                'image_product' => $dt['image_product'],
                'sku' => $dt['sku'],
                'description' => $dt['product_description']
            ];
            $this->transaction_model->insertOrder($configOrder);

            // Delete Cart
            $this->cart->remove($dt['product_id']);
        }

        // Return Data
        $dataReturn = [
            'success' => true,
            'idTransaction' => $idTransaction,
        ];
        return $this->response->setJSON($dataReturn);
    }
 
    // function untuk menghapus cart berdasarkan id
    public function remove($id = null)
    {
         if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        
        // cari product berdasarkan id
        $product = $this->product->getProduct($id);
        // cek data product
        if($product != null){ // jika product tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($id);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
        } else { // product tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/cart');
    }
}