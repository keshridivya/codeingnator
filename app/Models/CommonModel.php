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
    public function insertBusinessForm($table,$insertBusinessValue){
        $value = $this->db->table($table);
        $sql = $value->insert($insertBusinessValue);
        return $sql;
    }
    public function selectBusiness($table){
        $value=$this->db->table($table);
        $builder=$value->select('*');
        $query=$builder->get();
        return $query->getResult();;
    }
    public function deleteBusiValue($table,$where){
        $query=$this->db->table($table);
        return $query->delete($where);
    }
    public function selectBusinessUpdate($table,$where){
        $value=$this->db->table($table);
        $builder=$value->select('*');
        $builder->where($where);
        $query=$builder->get();
        $this->db->getLastQuery();
        return $query->getResult();
    }
    public function insertBusinessUpdate($table,$where,$data){
        $value = $this->db->table($table);
        $value->where($where);
        $sql = $value->update($where);
        return $sql;
    }
}
?>