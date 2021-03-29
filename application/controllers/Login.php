<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');

	}
	 
	public function index()
	{
		
        $this->load->view('header');
		$this->load->view('view_login');
		
					
	}

	public function save_new_pass()
	{
        $pass1 = $this->input->post('password1');
		$pass2 = $this->input->post('password2');
		if($pass1 == $pass2){
			$id = $this->session->userdata('user_id');
			$this->model->save_new_pass($pass1,$id);
			$this->session->set_flashdata
			('success','<div class="alert alert-success">
									<span>  
						<b> กรุณากรอกรหัสใหม่เพื่อเข้าสู่ระบบ !!</b> </span> 
			</div>');
			  redirect('login');  
		}
		
		else{
			$this->session->set_flashdata
			('failed','<div class="alert alert-danger">
									<span>  
						<b> รหัสผิดพลาด !!</b> - กรุณาตรวจสอบรหัสไหม่ </span> 
			</div>');
			redirect('main2');  
		}
	}

	public function Account()
	{
		$username =  $this->input->post('user_name');
		$userpass=  $this->input->post('user_pass');
		$data = $this->model->chk_login($username,$userpass);
		
		
		if($data==true) {
            $arrData = array('user_status'=> $data['user_status'],'user_pass'=> $data['user_pass'],'user_name'=> $data['user_name'],
             'user_group'=> $data['user_group'],'real_id'=> $data['id'],'user_id'=> $data['user_id']);	
             $this->session->set_userdata($arrData);
             $username = $this->session->userdata('username');

			 if($data['user_status'] != 1){
				redirect('main2'); 
                 
             } else{
				 if($data['user_group'] == "teacher"){
					$id = $data['id'];
					$sql ="SELECT * FROM teacher WHERE tch_id='$id'";
					$query = $this->db->query($sql);
					$data = $query->row();
					$this->session->set_userdata('tch_id',$data->tch_id);
					redirect('teacher'); 
				 }else if($data['user_group'] == "company"){
					$id = $data['id'];
					$data =$this->model->select_cpn_data($id);
					$this->session->set_userdata('cpn_id',$data[0]->cpn_id);
					$data[0]->cpn_status;
					if($data[0]->cpn_status == 0){
						$this->session->set_flashdata
						('successcpn','<div class="alert alert-success">
						<span><b> กรุณารอยืนยันจากเจ้าาหน้าที่ !!</b></span> 
						</div>');
			  			redirect('login'); 
					}else{
						redirect('company');  
					}
					
					die;
					redirect('company'); 
				 }else if($data['user_group'] == "student"){
					 $id = $data['id'];
					$sql ="SELECT * FROM student WHERE std_id='$id'";
					$query = $this->db->query($sql);
					$data_std = $query->row();
					$this->session->set_userdata('std_status',$data_std->std_status);
					$this->session->set_userdata('std_id',$data_std->std_id);
					redirect('student'); 
				}else if($data['user_group'] == "bilateral"){
					redirect('bilateral');
				}else if($data['user_group'] == "admin"){
					redirect('admin');	
				}
                
             }
        }
     else{
		$this->session->set_flashdata('msg_error','<div class="alert alert-danger fade in">
		<button class="close" data-dismiss="alert">
			×
		</button>
		<i class="fa-fw fa fa-times"></i>
		<strong>Error!</strong><br />รหัสผ่านไม่ถูกต้อง กรุณาทำการตรวจสอบข้อมูลอีกครั้งค่ะ <br /></div>');
        redirect('Login');  
     
	 }
				
	}
	
}

?>