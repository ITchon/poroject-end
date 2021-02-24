<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Admin extends CI_Controller {
 
 
public function __construct()
    {
        parent::__construct();
        $this->load->view('header2');
        $this->load->model('model');
        $this->model->chk_sessionadmin();
        $this->load->view('head');
        $this->load->view('sidebar');
    }
 
 public function index(){
    $this->load->view('admin_menu');
 }

 public function show_user_index(){
   $qry_inp =  "SELECT `user_id`,`user_name`, `user_pass`, `user_group`, `status`, `id` FROM `user`" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_user',$data);
}
public function show_company_index(){
   $qry_inp =  "SELECT `cpn_id`,`cpn_name`, `cpn_address`, `cpn_email`, `cpn_phnumber` FROM `company`" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_company',$data);
}

public function show_teacher_index(){
   $qry_inp =  "SELECT `tch_id`,`tch_name`, `tch_tel`, `tch_code` FROM `teacher`" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_teacher',$data);
}

public function show_student_index(){
   $qry_inp =  "SELECT student.std_id,c.cls_name,student.title,student.std_fname,student.std_lname,student.std_address,student.std_code,
   student.std_birthday,student.std_age,student.std_sex,department.dpm_name,teacher.tch_name
   FROM student
   INNER JOIN class AS c on student.cls_id = c.cls_id
   INNER JOIN department on department.dpm_id = c.dpm_id
   INNER JOIN teacher on teacher.tch_id = c.tch_id";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_student',$data);
}

public function insert_student_index(){
   $qry_inp =  "SELECT * FROM class" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('insert_student',$data);
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
        redirect('Admin/show_student_index');
	}



   public function edit_student()
   {
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->selectOnestudent($id);
        $qry_inp =  "SELECT * FROM class";
        $query = $this->db->query($qry_inp); 
        $data['result_cls'] = $query->result();
		$this->load->view('edit_student',$data);
   }
   public function edit_student_p()
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
         $std_id = $this->input->post('std_id');
         $id = $this->model->edit_student($title ,$std_fname ,$std_lname ,$std_address ,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id , $std_id);





        ########################
      //   $user_name = $std_code;
      //   $user_pass = $std_birthday;
      //   $user_group = "student";
        
      //   $this->model->edit_user($user_name,$user_pass,$user_group,$id);
        ########################
        redirect('Admin/show_student_index');
	}

   public function delete_student($std_id)
   {

      $result = $this->model->del_std_p($std_id);

      $id = $std_id;
      $result = $this->model->del_user($id);
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


   public function insert_company_index(){
      $qry_inp =  "SELECT * FROM class" ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('insert_company',$data);
   }
   public function insert_company()
	{
         
         $cpn_name    = $this->input->post('cpn_name');
         $cpn_address   = $this->input->post('cpn_address');
         $cpn_email      = $this->input->post('cpn_email');
         $cpn_phnumber    = $this->input->post('cpn_phnumber');
         $id = $this->model->insert_company($cpn_name ,$cpn_address ,$cpn_email ,$cpn_phnumber);

        redirect('Admin/show_company_index');
	}
   public function edit_company()
   {
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->selectOnecompany($id);
        $qry_inp =  "SELECT * FROM class";
        $query = $this->db->query($qry_inp); 
        $data['result_cls'] = $query->result();
		$this->load->view('edit_company',$data);
   }
   public function edit_company_p()
	{
      $cpn_id    = $this->input->post('cpn_id');
      $cpn_name    = $this->input->post('cpn_name');
      $cpn_address   = $this->input->post('cpn_address');
      $cpn_email      = $this->input->post('cpn_email');
      $cpn_phnumber    = $this->input->post('cpn_phnumber');
         $id = $this->model->edit_company($cpn_name ,$cpn_address ,$cpn_email ,$cpn_phnumber,$cpn_id);

        redirect('Admin/show_company_index');
	}

   public function delete_company($cpn_id)
   {

      $result = $this->model->del_cpn_p($cpn_id);

      $id = $cpn_id;
      $result = $this->model->del_user($id);
		if($result!=FALSE)
		{
            redirect('Admin/show_company_index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }


   public function insert_teacher_index(){
      $qry_inp =  "SELECT * FROM class" ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('insert_teacher',$data);
   }
   public function insert_teacher()
	{
         
         $tch_name    = $this->input->post('tch_name');
         $tch_tel   = $this->input->post('tch_tel');
         $tch_code      = $this->input->post('tch_code');
         $id = $this->model->insert_teacher($tch_name ,$tch_tel ,$tch_code);

        redirect('Admin/show_teacher_index');
	}
   public function edit_teacher()
   {
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->selectOneteacher($id);
        $qry_inp =  "SELECT * FROM class";
        $query = $this->db->query($qry_inp); 
        $data['result_cls'] = $query->result();
		$this->load->view('edit_teacher',$data);
   }
   public function edit_teacher_p()
	{
      $tch_id    = $this->input->post('tch_id');
      $tch_name    = $this->input->post('tch_name');
      $tch_tel    = $this->input->post('tch_tel');
      $tch_code   = $this->input->post('tch_code');

         $id = $this->model->edit_teacher($tch_name ,$tch_tel ,$tch_code,$tch_id);

        redirect('Admin/show_teacher_index');
	}

   public function delete_teacher($tch_id)
   {

      $result = $this->model->del_tch_p($tch_id);

      $id = $tch_id;
      $result = $this->model->del_user($id);
		if($result!=FALSE)
		{
            redirect('Admin/show_teacher_index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }

   
   


   


   
   
}
?>