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
    
    $sql =  "SELECT req.`req_id`,count(ar.ac_id) as total FROM `req` left join accept_req ar on ar.req_id = req.req_id group by ar.req_id" ;
   $query = $this->db->query($sql); 
   $data['chk_acc'] = $query->result_array();
    $qry_inp =  "SELECT req.req_id,company.cpn_id,company.cpn_name,company.cpn_img,company.cpn_add,company.cpn_email,company.cpn_phnumber,req.req_number
    ,req.req_sex,req.req_glevel,department.dpm_name
    FROM req
    INNER JOIN company on company.cpn_id = req.cpn_id
    INNER JOIN department on department.dpm_id = req.dpm_id" ;
    $query = $this->db->query($qry_inp); 
    $data['result'] = $query->result();
    $this->load->view('main_menu',$data);
 }
 public function index2(){  
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->select_main_data($id);
        
      $this->load->view('main_data',$data);
 }

 




 
 
}