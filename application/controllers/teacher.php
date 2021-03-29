<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Teacher extends CI_Controller {
 
 
   public function __construct()
   {
       parent::__construct();
       $this->load->view('header2');
       $this->load->model('model');
       $this->load->view('head_tch');
      $this->load->view('tch_sidebar');
      
       
   }

public function index(){
   $tch_id = $this->session->userdata('tch_id');
   $qry_inp =  "SELECT * FROM class where class.tch_id = $tch_id ";
   $query = $this->db->query($qry_inp); 
   $data['result1'] = $query->result();
   $data['count_cls'] = $this->model->count_cls($data);
   
   $qry_inp =  "SELECT student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status,accept_req.ac_id,company.cpn_name,student.std_img
      FROM student  
      LEFT JOIN accept_req on accept_req.std_id = student.std_id
      LEFT JOIN req on req.req_id = accept_req.req_id
      LEFT JOIN company on company.cpn_id = req.cpn_id
      LEFT JOIN class on class.cls_id = student.cls_id
      LEFT JOIN department on department.dpm_id = class.dpm_id WHERE class.tch_id = $tch_id" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   
   $this->load->view('main_menu_tch',$data);
   
}
public function index2(){  
   $std_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_data_std_cnp($std_id);
   $data['result2'] = $this->model->select_main_data_std_cnp($std_id);
   
   $this->load->view('main_data_tch',$data);
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
 
   public function index_priv_tch(){
      $tch_id = $this->session->userdata('tch_id');
     
      $qry_inp =  "SELECT teacher.tch_id,teacher.tch_name,teacher.tch_tel,teacher.tch_email,teacher.tch_card,teacher.tch_img
      ,department.dpm_name,class.cls_name,class.cls_glevel,class.cls_glevel,cls_group
      FROM class
      INNER JOIN teacher on teacher.tch_id = class.tch_id
      INNER JOIN department on department.dpm_id = class.dpm_id
      WHERE teacher.tch_id = $tch_id" ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
  
      $this->load->view('private_tch',$data);
      
   }
 
 
}