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
        $qry_inp =  "SELECT student.std_id,c.cls_name,student.title,student.std_fname,student.std_lname,student.std_address,student.std_code,
        student.std_birthday,student.std_age,student.std_sex,department.dpm_name,student.std_status,teacher.tch_name
        FROM student
        INNER JOIN class AS c on student.cls_id = c.cls_id
        INNER JOIN department on department.dpm_id = c.dpm_id
        INNER JOIN teacher on teacher.tch_id = c.tch_id";
        $query = $this->db->query($qry_inp); 
        $data['result'] = $query->result();
        $this->load->view('btr_show_student',$data);
     }
     
     public function insert_student_index(){
        $qry_inp =  "SELECT * FROM class" ;
        $query = $this->db->query($qry_inp); 
        $data['result'] = $query->result();
        $this->load->view('btr_insert_student',$data);
     }
     public function insert_student()
	{
		   $title    = $this->input->post('title'); 
         $std_fname    = $this->input->post('std_fname');
         $std_lname    = $this->input->post('std_lname');
         $std_address   = $this->input->post('std_address');
         $std_code      = $this->input->post('std_code');
         $std_birthday    = $this->input->post('std_birthday');
         $std_sex    = $this->input->post('std_sex');
		   $std_age  = $this->input->post('std_age');
		   $cls_id   = $this->input->post('cls_id');
         // $dpm_name = $this->input->post('dpm_name');
         // $tch_name = $this->input->post('tch_name');
         $id = $this->model->insert_student($title ,$std_fname ,$std_lname ,$std_address ,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id);

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
       $data['result'] = $this->model->accept_std($std_id);
       
       redirect('bilateral/index','refresh');
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


 
 
}