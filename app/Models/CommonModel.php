<?php
namespace App\Models;
use CodeIgniter\Model;

class CommonModel extends Model{
    protected $table ='emp_regis';
    protected $primaryKey ='id';
    public function insertEmployeeValue($table,$insertValue){
        $value = $this->db->table($table);
        $query = $value->insert($insertValue);
        return $query;
    }
    public function selectValue($table,$where=array()){
        $value=$this->db->table($table);
        $builder=$value->select('*');
        $builder->where($where);
        $query=$builder->get();
        return $query->getResult();
    }
}
?>