<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Bilateral extends CI_Controller {
 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->view('header2');
        $this->load->model('model');
        $this->load->view('head_main');
        $this->load->view('btr_sidebar');
        
    }
 
    public function index(){
      $qry_inp =  "SELECT student.std_id,c.cls_name,student.title,student.std_fname,student.std_lname,student.std_code,
      student.std_birthday,student.std_age,student.std_sex,student.std_status,department.dpm_name
      FROM student
      INNER JOIN class AS c on student.cls_id = c.cls_id
      INNER JOIN department on department.dpm_id = c.dpm_id";
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('btr_show_student',$data);
     }
     
     
     public function insert_student_index(){
        $qry_inp =  "SELECT department.dpm_id ,department.dpm_name,class.cls_id,class.cls_glevel,class.cls_name,class.cls_group
        FROM class
        INNER JOIN department on department.dpm_id = class.dpm_id" ;
        $query = $this->db->query($qry_inp); 
        $data['result'] = $query->result();
        $this->load->view('btr_insert_student',$data);
     }
     public function insert_student()
	{
		   $title    = $this->input->post('title'); 
         $std_fname    = $this->input->post('std_fname');
         $std_lname    = $this->input->post('std_lname');
         $std_idcard    = $this->input->post('std_idcard');
         $std_code      = $this->input->post('std_code');
         $std_birthday    = $this->input->post('std_birthday');
         $std_sex    = $this->input->post('std_sex');
		   $std_age  = $this->input->post('std_age');
		   $cls_id   = $this->input->post('cls_id');
         // $dpm_name = $this->input->post('dpm_name');
         // $tch_name = $this->input->post('tch_name');
         $id = $this->model->insert_student($title ,$std_fname ,$std_lname,$std_idcard,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id);

        ########################
        $user_name = $std_code;
        $user_pass = $std_birthday;
        $user_group = "student";
        
        $this->model->insert_user($user_name,$user_pass,$user_group,$id);
        ########################
        redirect('bilateral/index');
	}

    public function accept_std(){   
        $std_id = $this->uri->segment('3');
       $data = $this->model->chk_btr_insert_std($std_id);
       if($data[0]->std_status != 0){
         $this->session->set_flashdata
            ('failed','<div class="alert alert-warning">
                              <span>  
                     <b>อนุมัตินักเรียนคนนี้ไปแล้ว !!</span> 
            </div>');
            redirect('bilateral/index','refresh');  
       }else{
         $data['result'] = $this->model->accept_std($std_id);
         $this->session->set_flashdata
            ('success','<div class="alert alert-success">
                              <span>  
                     <b>อนุมัติสำเร็จ</span> 
            </div>');
            
            redirect('bilateral/index','refresh');  
       }
       redirect('bilateral/index','refresh');
    }

    public function cancel_accept_std(){  
      $std_id = $this->uri->segment('3'); 
      $data  = $this->model->chk_btr_insert_std($std_id);
      if($data[0]->std_status == 0){
        $this->session->set_flashdata
           ('failed','<div class="alert alert-warning">
                             <span>  
                    <b>ยกเลิกอนุมัตินักเรียนคนนี้ไปแล้ว !!</span> 
           </div>');
           redirect('bilateral/index','refresh');  
      }else{
         $data1  = $this->model->btr_cancel_accept_std($std_id);
        $this->session->set_flashdata
           ('success','<div class="alert alert-success">
                             <span>  
                    <b>ยกเลิกอนุมัติสำเร็จ</span> 
           </div>');
           
           redirect('bilateral/index','refresh');  
      }
      
      
        
   }

    public function delete_student($std_id)
   {
      $result = $this->model->del_std_p($std_id);
		if($result!=FALSE)
		{
            redirect('bilateral/index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }

   


   public function delete_user($user_id)
   {
      $result = $this->model->del_user($user_id);
		if($result!=FALSE)
		{
            redirect('bilateral/btr_show_student','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('btr_show_student','refresh');
		}
   }


   public function index2(){
         $qry_inp =  "SELECT * FROM `company`" ;
         $query = $this->db->query($qry_inp); 
         $data['result'] = $query->result();
         $this->load->view('btr_show_cpn',$data);
      
   }

   public function index3(){
      $cpn_id = $this->uri->segment('3');
      $data['result'] = $this->model->select_main_btr_cpn_data($cpn_id);
   $this->load->view('btr_show_cpn_data',$data);
   
}
   public function accept_cpn(){  
      $cpn_id = $this->uri->segment('3'); 
      $data  = $this->model->chk_btr_insert_cpn($cpn_id);
      if($data[0]->cpn_status != 0){
        $this->session->set_flashdata
           ('failed','<div class="alert alert-warning">
                             <span>  
                    <b>คุณได้อนุมัติบริษัทนี้ไปแล้ว !!</span> 
           </div>');
           redirect('bilateral/index2','refresh');  
      }else{
         $data1  = $this->model->btr_accept_cpn($cpn_id);
        $this->session->set_flashdata
           ('success','<div class="alert alert-success">
                             <span>  
                    <b>อนุมัติบริษัทสำเร็จ</span> 
           </div>');
           
           redirect('bilateral/index2','refresh');  
      }
      
      
        
  }

  public function cancel_accept_cpn(){  
   $cpn_id = $this->uri->segment('3'); 
   $data  = $this->model->chk_btr_insert_cpn($cpn_id);
   if($data[0]->cpn_status == 0){
     $this->session->set_flashdata
        ('failed','<div class="alert alert-warning">
                          <span>  
                 <b>ยกเลิกอนุมัติไปแล้ว !!</span> 
        </div>');
        redirect('bilateral/index2','refresh');  
   }else{
      $data1  = $this->model->btr_cancel_accept_cpn($cpn_id);
     $this->session->set_flashdata
        ('success','<div class="alert alert-success">
                          <span>  
                 <b>ยกเลิกอนุมัติสำเร็จ</span> 
        </div>');
        
        redirect('bilateral/index2','refresh');  
   }
   
   
     
}

  

  public function delete_cpn_f($ac_id)
  {
     
     $result = $this->model->del_cpn_p($ac_id);
     

     

     if($result!=FALSE)
     {
         $this->session->set_flashdata
           ('success_del','<div class="alert alert-success">
                             <span>  
                    <b>ลบสำเร็จ</span> 
           </div>');
           redirect('bilateral/index2','refresh');
     }
     else
     {
         echo "<script>alert('Something wrong')</script>";
          redirect('manage_student','refresh');
     }
  }

  public function insert_company_index(){
   $qry_inp =  "SELECT * FROM class" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('btr_insert_company',$data);
}
 
public function insert_company()
	{
         
         $cpn_name    = $this->input->post('cpn_name');
         $cpn_add   = $this->input->post('cpn_add');
         $cpn_email      = $this->input->post('cpn_email');
         $cpn_phnumber    = $this->input->post('cpn_phnumber');
         $cpn_img    = $this->input->post('cpn_img');
         $id = $this->model->insert_company($cpn_name ,$cpn_add ,$cpn_email ,$cpn_phnumber,$cpn_img);
         $user_name = $cpn_email;
         $user_pass = $cpn_phnumber;
         $user_group = "company";
        
        $this->model->insert_user($user_name,$user_pass,$user_group,$id);
        redirect('bilateral/index2');
	} 

}