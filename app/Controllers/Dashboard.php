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
        return view('pages/Business_registration',$data);
    }
}
?>