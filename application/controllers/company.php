<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Company extends CI_Controller {
 
 
   public function __construct()
   {
       parent::__construct();
       $this->load->view('header2');
       $this->load->model('model');
       $this->load->view('head_main');
       $this->load->view('cpn_sidebar');
       
   }

public function index(){
   $qry_inp =  "SELECT student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status
      FROM accept_req
      INNER JOIN req on req.req_id = accept_req.req_id
      INNER JOIN company on company.cpn_id = req.cpn_id
      INNER JOIN student on student.std_id = accept_req.std_id
      INNER JOIN class on class.cls_id = student.cls_id
      INNER JOIN department on department.dpm_id = class.dpm_id" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('main_menu_cpn',$data);
}
public function index2(){  
   $std_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_data_std_cnp($std_id);
   $this->load->view('main_data_cpn',$data);
}
public function cpn_accept_std(){   
   $std_id = $this->uri->segment('3');
   $data = $this->model->chk_cpn_insert_std($std_id);
  if($data[0]->ac_status != null){
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
 

 

 
 
}