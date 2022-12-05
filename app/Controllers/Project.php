<?php
namespace App\Controllers;
use App\Models\CommonModel;
use App\Libraries\Hash;
// use App\Controllers\BaseController;
class Project extends BaseController{

    public function __construct(){
        helper(['url','form']);
    }

    public function index(){
        return view("pages/index");
    }
   
    public function employee(){
        
        if($this->request->getMethod() == 'post'){
            
            $valid=$this->validate([
                'fname'=>['rules' => 'required','errors'=>['required'=>'Your First name required']],
                'lname'=>['rules' => 'required','errors'=>['required'=>'Your Last name required']],
                'phone'=>'required',
                'email'=>'required|valid_email|is_unique[emp_regis.email]',
                'password'=>'required|min_length[6]|max_length[8]',
                'cpassword'=>'required|min_length[6]|max_length[8]|matches[password]'
            ]);
            if(!$valid == true){
                return view('pages/employeeRegistration',['validText'=>$this->validator]);
            
            }
            else{
                
                $fname=$this->request->getPost("fname");
                $lname=$this->request->getPost("lname");
                $phone=$this->request->getPost('phone');
                $email=$this->request->getPost('email');
                $password=$this->request->getPost('password');

                $insert=['fname'=>$fname,
                'lname'=>$lname,
                'phone'=>$phone,
                'email'=>$email,
                'password'=>Hash::make_password($password)];

                
                $model= new CommonModel();
                $query=$model->insertEmployeeValue("emp_regis",$insert);
                if(!$query){
                    return redirect()->to(base_url('employee'))->with('fail','Something Went Wrong');
                }
                else{
                    return redirect()->to(base_url('/'))->with('success','You are registered Successfully');
                }
            }
        }

        return view("pages/employeeRegistration");
    }

    public function checkLogin(){
        $validation=$this->validate([
           'email'=>['rules'=>'required|valid_email|is_not_unique[emp_regis.email]',
                    'errors'=>['required'=>'Email is required',
                            'valid_email'=>'Please enter valid email id',
                            'is_not_unique'=>'This Email is not registered']
            ],
            'password'=>['rules'=>'required|min_length[6]|max_length[8]',
                    'errors'=>['required'=>'Password is required',
                    'min_length'=>'Password must have atleast 5 characters in length',
                    'max_length'=>'Password must not have more than 8 characters in length']
            ]
        ]);

        if(!$validation){
            return view('pages/index',['validTextLogin'=>$this->validator]);
        }
        else{
            $email=$this->request->getPost("email");
            $password=$this->request->getPost("password");
            $chk=$this->request->getPost("chk");
            echo $password;
            $model=new CommonModel();
            $where=array('email'=>$email);
            $result=$model->selectValue('emp_regis',$where);
            foreach($result as $row){
                $pass=$row->password;
                $empid=$row->id;
            }
            $checkpass=Hash::check_password($password,$pass);
            if($checkpass){
                if($chk ==1){
                    setcookie('email', $email, time() + (86400 * 30), "/");
                    setcookie('password', $password, time() + (86400 * 30), "/");
                }
                session()->set('logged',$empid);
                return redirect()->to(base_url('/Dashboard'));  
                
            }
            else{
               
               session()->setFlashdata('fail','Incorrect password');
               return redirect()->to(base_url('/'))->withInput();
                 
            }
        
        }
    }

    public function logout(){
        if(session()->has('logged')){
            setcookie("email","", time() - 3600);
            setcookie("password","", time() - 3600);
            session()->remove('logged');
            return redirect()->to(base_url('/'))->with('fail','you are logged out');
        }
    }

    public function forgetPassword(){
        $model= new CommonModel();
        $email = $this->input->post('email');      
         $findemail = $this->usermodel->ForgotPassword($email);  
         if($findemail){
          $this->model->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('msg',' Email not found!');
          redirect(base_url('/'),'refresh');
           }
        return view('pages/forgetPassword');
    }
   
}
?>