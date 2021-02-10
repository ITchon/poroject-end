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
   $qry_inp =  "SELECT * FROM `student_detail`" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_student',$data);
}

}
?>