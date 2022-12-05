<?php
namespace App\Models;

use CodeIgniter\Model;
class CommonModel extends Model{

public function insertValue($table,$insertdata){
    $value = $this->db->table($table);
    $query = $value->insert($insertdata);
    return $query;
}
public function selectValue($table,$where=array()){
    $value=$this->db->table($table);
    $builder=$value->select('*');
    $builder->where($where);
    $query=$builder->get();
    // echo $this->db->getLastQuery(); // for check data get
    return $query->getResult();
    // return $query->getResultArray(); it's simplay array show(fetch) like core php ($row['name'];)
}
}
?>