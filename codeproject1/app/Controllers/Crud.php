<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Crud extends BaseController{
 public function index(){
   
   echo view('include/header');
   $model=new CommonModel();
   $where=array('status'=>'1');
   $result=$model->selectValue('user',$where);
   $data['result']=$result;
    return view("pages/select",$data);
    echo view('include/footer');
 }

 public function insert(){
   //for helper autoload go to basecontroller.php and write under protected $helpers['form']
   $model= new CommonModel();
   helper(['form']);
   if($this->request->getMethod() == 'post'){

      $rules = $this->validate([
         'name' => ['label' => 'Name','rules' => 'trim|required'],
         'mob' => ['label' => 'Mobile','rules' => 'trim|required'],
         'email' => ['label' => 'Email','rules' => 'trim|required'],
      ]);
      if($rules == true){
         $name=$this->request->getPost("name");
      $mobile=$this->request->getPost("mob");
      $email=$this->request->getPost("email");
      $date=date('y-m-d H:i:sa');

      // $insert['name']=$name;
      // $insert['mobile']=$mobile;
      // $insert['email']=$email;
      //instead of this(comment)
      $insert=['name'=>$name,
      'mobile'=>$mobile,
      'email'=>$email,
   'creation_date'=>$date,
'status'=>'1'];

      $model->insertValue("user",$insert);
      return redirect()->to(base_url('/'));

      }else{
         echo view("pages/insert");
      }

   }else{
      echo view("pages/insert");
   }
}
}

//for page view ke liye dono use kr skte hai return and echo but moslty we use return
?>