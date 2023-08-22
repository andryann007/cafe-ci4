<?php

namespace App\Models;
use CodeIgniter\Model;

class AccountModel extends Model{
    protected $table = 'data_user';
    protected $primaryKey = 'user_id';

    public function getData(){
        $query = $this -> db -> table('data_user')
        -> get()->getResultArray();

        return $query;
    }

    public function saveData($data){
        $query = $this -> db -> table('data_user')
        -> insert($data);
        
        return $query;
    }

    public function updateData($data, $id){
        $query = $this -> db -> table('data_user')
        -> update($data, array('user_id' => $id));
        
        return $query;
    }
}