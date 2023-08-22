<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table = 'data_product';
    protected $primaryKey = 'product_id';

    public function getData(){
        $query = $this -> db -> table('data_product')
        -> join('data_category', 'data_category.category_id = data_product.category_id')
        -> get()->getResultArray();

        return $query;
    }

    public function getFewData(){
        $query = $this -> db -> table('data_product')
        -> join('data_category', 'data_category.category_id = data_product.category_id')
        -> limit(6)
        -> get()->getResultArray();

        return $query;
    }

    public function saveData($data){
        $query = $this -> db -> table('data_product')
        -> join('data_category', 'data_category.category_id = data_product.category_id')
        -> insert($data);
        
        return $query;
    }

    public function updateData($data, $id){
        $query = $this -> db -> table('data_product')
        -> join('data_category', 'data_category.category_id = data_product.category_id')
        -> update($data, array('product_id' => $id));
        
        return $query;
    }
}