<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Company extends CI_Controller {
 
 
   public function __construct()
   {
       parent::__construct();
       $this->load->view('header2');
       $this->load->model('model');
       
       
       
   }

public function index(){
   $qry_inp =  "SELECT student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status,accept_req.ac_id
      FROM accept_req
      INNER JOIN req on req.req_id = accept_req.req_id
      INNER JOIN company on company.cpn_id = req.cpn_id
      INNER JOIN student on student.std_id = accept_req.std_id
      INNER JOIN class on class.cls_id = student.cls_id
      INNER JOIN department on department.dpm_id = class.dpm_id" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('head_main');
   $this->load->view('cpn_sidebar');
   $this->load->view('main_menu_cpn',$data);
   
}
public function index2(){  
   $std_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_data_std_cnp($std_id);
   $this->load->view('head_main');
   $this->load->view('cpn_sidebar');
   $this->load->view('main_data_cpn',$data);
}
public function cpn_accept_std(){   
   $std_id = $this->uri->segment('3');
   $data = $this->model->chk_cpn_insert_std($std_id);
  if($data[0]->ac_status != 0){
   $this->session->set_flashdata
      ('failed','<div class="alert alert-warning">
                        <span>  
               <b>คุณได้รับนักศึกษาคนนี้เข้าฝึกงานแล้ว !!!</span> 
      </div>');
      redirect('company');  
 }else{
   $data2 = $this->model->cpn_accept_std($std_id);
   $this->session->set_flashdata
      ('success','<div class="alert alert-success">
                        <span>  
               <b>รับนักศึกษาเข้าฝึกงานเรียบร้อย</span> 
      </div>');
      
      redirect('company');  
 }
  
}
public function insert_req_cpn(){
   $qry_inp =  "SELECT student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status,accept_req.ac_id
      FROM accept_req
      INNER JOIN req on req.req_id = accept_req.req_id
      INNER JOIN company on company.cpn_id = req.cpn_id
      INNER JOIN student on student.std_id = accept_req.std_id
      INNER JOIN class on class.cls_id = student.cls_id
      INNER JOIN department on department.dpm_id = class.dpm_id" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('insert_req_cpn_f',$data);
}
public function delete_ac_f($ac_id)
   {
      
      $result = $this->model->del_ac_p($ac_id);
      

      

		if($result!=FALSE)
		{
            redirect('Admin/show_student_index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }
 
   public function registerindex(){
    
    
      $this->load->view('add_cpn');
      
      
   }
  
   public function registercpn(){
      $cpn_name =  $this->input->post('cpn_name');
     $cpn_address=  $this->input->post('cpn_address');
     $cpn_email =  $this->input->post('cpn_email');
     $cpn_phnumber=  $this->input->post('cpn_phnumber');
      $cpn_img =  $this->input->post('cpn_img');
      $id = $this->model->insert_registercpn($cpn_name,$cpn_address,$cpn_email,$cpn_phnumber,$cpn_img);
      $data = $this->model->insert_user($cpn_email,$cpn_phnumber,'company',$id);
      redirect('login');
   }
 
 
}