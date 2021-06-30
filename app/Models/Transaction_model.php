<?php namespace App\Models;
use CodeIgniter\Model;
 
class Transaction_model extends Model
{
    protected $table = 'transaction';
     
    public function getTransaction($id = false)
    {
        if($id === false){
            return $this->table('transaction')
                        // ->select('products.product_name, transaction.*')
                        ->select('transaction.*')
                        // ->join('products', 'products.product_id = transaction.product_id')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('transaction')
                        ->select('transaction.*')
                        // ->join('products', 'products.product_id = transaction.product_id')
                        ->where('transaction.id', $id)
                        ->get()
                        ->getRowArray();
        }  
    }

    public function insertTransaction($data)
    {
        $db = db_connect('default');
        $transaction = $this->db->table($this->table)->insert($data);

        $id = $db->insertID();
        return $id;
    }

    public function listMyOrder($id) {
        $db = db_connect('default');
        $order = $this->db->table('order')
            ->select('order.*')
            ->where('order.id_transaksi', $id)
            ->get()
            ->getResultArray();
        return $order;
    }

    public function insertOrder($data) {
        $db = db_connect('default');
        $order = $this->db->table('order')->insert($data);
    }

    public function updateTransaction($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}