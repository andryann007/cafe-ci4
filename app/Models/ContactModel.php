<?php

namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model{
    protected $table = 'data_contact';
    protected $primaryKey = 'contact_id';

    public function getData(){
        $query = $this -> db -> table('data_contact')
        -> get()->getResultArray();

        return $query;
    }

    public function saveData($data){
        $query = $this -> db -> table('data_contact')
        -> insert($data);
        
        return $query;
    }
}