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
        // $this->db->getLastQuery();
        return $query->getResult();
    }
    public function insertBusinessUpdate($table,$where,$data){
        $value = $this->db->table($table);
        $value->where($where);
        $sql = $value->update($data);
        return $sql;
    }
    public function insertSocialMedia($table,$insertvalue){
        $value=$this->db->table($table);
        $query=$value->insert($insertvalue);
        return $query;
    }
    public function ForgotPassword($email)
    {
           $this->db->select('email');
           $this->db->from('user_registrations'); 
           $this->db->where('email', $email); 
           $query=$this->db->get();
           return $query->row_array();
    }
    public function sendpassword($data)
   {
           $email = $data['email'];
           $query1=$this->db->query("SELECT *  from user_registrations where email = '".$email."' ");
           $row=$query1->result_array();
           if ($query1->num_rows()>0)
         
   {
           $passwordplain = "";
           $passwordplain  = rand(999999999,9999999999);
           $newpass['password'] = md5($passwordplain);
           $this->db->where('email', $email);
           $this->db->update('user_registrations', $newpass); 
           $mail_message='Dear '.$row[0]['first_name'].','. "\r\n";
           $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
           $mail_message.='<br>Please Update your password.';
           $mail_message.='<br>Thanks & Regards';
           $mail_message.='<br>Your company name';        
           date_default_timezone_set('Etc/UTC');
           require FCPATH.'assets/PHPMailer/PHPMailerAutoload.php';
           $mail = new PHPMailer;
           $mail->isSMTP();
           $mail->SMTPSecure = "tls"; 
           $mail->Debugoutput = 'html';
           $mail->Host = "yooursmtp";
           $mail->Port = 587;
           $mail->SMTPAuth = true;   
           $mail->Username = "your@email.com";    
           $mail->Password = "password";
           $mail->setFrom('admin@site', 'admin');
           $mail->IsHTML(true);
           $mail->addAddress($email);
           $mail->Subject = 'OTP from company';
           $mail->Body    = $mail_message;
           $mail->AltBody = $mail_message;
   if (!$mail->send()) {
        $this->session->set_flashdata('msg','Failed to send password, please try again!');
   } else {
      $this->session->set_flashdata('msg','Password sent to your email!');
   }
     redirect(base_url().'user/Login','refresh');        
   }
   else
   {  
    $this->session->set_flashdata('msg','Email not found try again!');
    redirect(base_url().'user/Login','refresh');
   }
   }
}
?>