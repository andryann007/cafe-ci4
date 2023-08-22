<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model{
    protected $table = 'data_category';
    protected $primaryKey = 'category_id';

    public function getData(){
        $query = $this -> db -> table('data_category')
        -> get()->getResultArray();

        return $query;
    }

    public function saveData($data){
        $query = $this -> db -> table('data_category')
        -> insert($data);
        
        return $query;
    }

    public function updateData($data, $id){
        $query = $this -> db -> table('data_category')
        -> update($data, array('category_id' => $id));
        
        return $query;
    }

    public function deleteData($id){
        $query = $this -> db -> table('data_category')
        -> where('category_id', $id)
        -> delete();

        return $query;
    }
}