<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Student extends CI_Controller {
 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->view('header2');
        $this->load->model('model');
        $this->load->view('head_main');
        $this->load->view('sidebar_std');
        
    }
 
 public function index(){
    
    
    $qry_inp =  "SELECT req.req_id,req.req_sex,req.req_glevel,company.cpn_id,company.cpn_name,company.cpn_add,company.cpn_email,company.cpn_phnumber,department.dpm_name,req.req_number
    FROM req
    INNER JOIN company on company.cpn_id = req.cpn_id
    INNER JOIN department on department.dpm_id = req.dpm_id" ;
    $query = $this->db->query($qry_inp); 
    $data['result'] = $query->result();
    $this->load->view('main_menu_std',$data);
 }
 public function index2(){  
         $id = $this->uri->segment('3');
         $std_status = $this->session->userdata('std_status');
         
        $data['result'] = $this->model->select_main_data($id);
      $this->load->view('main_data_std',$data,$std_status);
 }
 public function req(){  
    $req_id = $this->uri->segment('3'); 
    $real_id = $this->session->userdata('real_id');
    $data  = $this->model->chk_insert_req($req_id,$real_id);
    
    if($data != null){
      $this->session->set_flashdata
			('failed','<div class="alert alert-warning">
									<span>  
						<b>คุณได้สมัครเข้าฝึกงานที่นี่แล้ว</span> 
			</div>');
         redirect('student');  
    }else{
      $data1 = $this->model->insert_req($req_id,$real_id);
      $this->session->set_flashdata
			('success','<div class="alert alert-success">
									<span>  
						<b>คุณได้สมัคเข้าฝึกงานเรียบร้อย</span> 
			</div>');
         
         redirect('student');  
    }
    
    
		
}




 
 
}