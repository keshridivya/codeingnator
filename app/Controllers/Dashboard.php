<?php

namespace App\Controllers;
use App\Models\CommonModel;

class Dashboard extends BaseController
{
    public function Dashboard()
    { 
        $model=new CommonModel();
        $loggedId=session()->get('logged');
        $userInfo =$model->find($loggedId);
        $data=['title'=>'Dashboard',
        'userInfo'=>$userInfo];
        return view('pages/dashboard',$data);
    }

    public function businessRegis(){
        $model=new CommonModel();
        $loggedId=session()->get('logged');
        $userInfo =$model->find($loggedId);
        $data=['title'=>'Registration',
        'userInfo'=>$userInfo];
        $result=$model->selectBusiness('business_form');
        $data['result']=$result;
        return view('pages/Business_registration',$data);
    }
    public function businessForm($id = null){
        $model=new CommonModel();
        $data['editRecord'] = "";
        $loggedId=session()->get('logged');
        $userInfo =$model->find($loggedId);
        $data=['title'=>'Registration Form',
        'userInfo'=>$userInfo];
        
        if($id != null){
            $where=['id'=>$id];
            $fetchRow=$model->selectBusinessUpdate("business_form",$where);
            if(!empty($fetchRow)){
                $data['editRecord'] = $fetchRow;
            }else{
                return redirect()->to(base_url('Registration'));
            }
        }
        if($this->request->getMethod() == 'post'){
            $name=$this->request->getPost("name");
            $email=$this->request->getPost("email");
            $mob=$this->request->getPost("mob");
            $whtsp=$this->request->getPost("whtsp");
            $busi_name=$this->request->getPost("busi_name");
            $office_name=$this->request->getPost("office_name");

            $insertval=['owner_name'=>$name,
            'email'=>$email,
            'phone'=>$mob,
            'whatsapp_no'=>$whtsp,
            'office_address'=>$office_name,
            'business_name'=>$busi_name];

            $model= new CommonModel();
            if($id == null){
                $query=$model->insertBusinessForm("business_form",$insertval);
            }
            else{
                $query=$model->insertBusinessUpdate("business_form",array('id'=>$id),$insertval);
            }
            if(!$query){
                return redirect()->to(base_url('Business'))->with('fail','Something Went Wrong');
            }
            else{
                return redirect()->to(base_url('Registration'))->with('success','You are registered Successfully');
            }

        }
        
        return view('pages/Bus_reg_form',$data);
    }
    public function busiForm(){
      
    }

    public function deleteBusiness($id){
        $model=new CommonModel();
        if($id== null){
            return redirect()->to(previous_url());
        }
        else{
            $where=array('id'=>$id);
            $model->deleteBusiValue('business_form',$where);
            return redirect()->to(base_url('Registration'));
        }
    }
}
?>