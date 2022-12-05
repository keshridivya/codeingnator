<?php

namespace App\Controllers;
use App\Models\CommonModel;

class Dashboard extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }
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

    public function businessForm(){
        $model=new CommonModel();
        $data['editRecord'] = "";
        $loggedId=session()->get('logged');
        $userInfo =$model->find($loggedId);
        $data=['title'=>'Registration Form',
        'userInfo'=>$userInfo];
        if($this->request->getMethod() == 'post'){

            $valid=$this->validate([
                'name'=>['rules' => 'required',
                        'errors'=>['required'=>'Your Full name required']],
                'busi_name'=>['rules' => 'required',
                        'errors'=>['required'=>'Your Business name required']],
                'office_name'=>['rules'=>'required',
                        'errors'=>['required'=>'Please fill Office Address']],
                'email'=>['rules'=>'required|valid_email|is_unique[emp_regis.email]',
                        'required'=>'Email is required',
                        'valid_email'=>'Please enter valid email id',
                        'is_not_unique'=>'This Email is not registered'],
                'mob'=>['rules'=>'required|min_length[10]|max_length[10]',
                        'errors'=>['required'=>'Mobile number is required',
                        'min_length'=>'Please enter 10 digit mobile number']],
                'whtsp'=>['rules'=>'required|min_length[10]|max_length[10]',
                        'errors'=>['required'=>'Whatsapp number is required',
                        'min_length'=>'Please enter 10 digit Whatsapp number']]
            ]);

            if(!$valid){
                return view('pages/Bus_reg_form',['validation'=>$this->validator]);
            }
            else{
                
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
            
                $query=$model->insertBusinessForm("business_form",$insertval);
                
                if(!$query){
                    return redirect()->to(base_url('Business'))->with('fail','Something Went Wrong');
                }
                else{
                    return redirect()->to(base_url('Registration'))->with('success','You are registered Successfully');
                }
            }
        }
        
        return view('pages/Bus_reg_form',$data);
    }
    public function busiForm($id = null){
        $model=new CommonModel();
        $data['editRecord'] = "";
        $loggedId=session()->get('logged');
        $userInfo =$model->find($loggedId);
        $data=['title'=>'Registration update',
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
            $name1=$this->request->getPost("name");
            $email=$this->request->getPost("email");
            $mob=$this->request->getPost("mob");
            $whtsp=$this->request->getPost("whtsp");
            $busi_name=$this->request->getPost("busi_name");
            $office_name=$this->request->getPost("office_name");

            $insertval=['owner_name'=>$name1,
            'email'=>$email,
            'phone'=>$mob,
            'whatsapp_no'=>$whtsp,
            'office_address'=>$office_name,
            'business_name'=>$busi_name];

            $where=array('id'=>$id);
            $query=$model->insertBusinessUpdate("business_form",$where,$insertval);
            
            if(!$query){
                return redirect()->to(base_url('edit/'.$id))->with('fail','Something Went Wrong');
            }
            else{
                return redirect()->to(base_url('Registration'))->with('success','You are registered Successfully');
            }
        }
        return view('pages/businessUpdate',$data);
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

    public function personal_info(){
       $business_id=$this->request->getPost('business_id');
       $business_name=$this->request->getPost('business_name');
       $name=$this->request->getPost('name');
       $number=$this->request->getPost('number');
       $email=$this->request->getPost('email');
       $password=$this->request->getPost('password');

       $insertvalue=[
        'number'=>$number,
        'email'=>$email,
        'password'=>$password,
        'user_name'=>$name,
        'business_id'=>$business_id,
        'social_media_name'=>$business_name
       ];
       $model= new CommonModel;
       $query=$model->insertSocialMedia("social_media",$insertvalue);
       if(!$query){
        return redirect()->to(base_url('Registration'))->with('fail','Something Went Wrong');
        }
        else{
            return redirect()->to(base_url('Registration'))->with('success','You are registered Successfully');
        }
    }
}
?>