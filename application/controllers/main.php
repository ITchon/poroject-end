<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Main extends CI_Controller {
 
 
public function __construct()
    {
        parent::__construct();
        $this->load->view('header2');
        $this->load->model('model');
        $this->load->view('head_main');
        $this->load->view('main_side');
        
    }
 
 public function index(){
    
    
    $qry_inp =  "SELECT `cpn_id`,`cpn_name`, `cpn_address`, `cpn_email`, `cpn_phnumber` FROM `company`" ;
    $query = $this->db->query($qry_inp); 
    $data['result'] = $query->result();
    $this->load->view('main_menu',$data);
 }
 public function index2(){  
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->select_main_data($id);
      $this->load->view('main_data');
 }

 




 
 
}