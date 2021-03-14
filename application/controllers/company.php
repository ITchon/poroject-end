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
   
   
   $qry_inp =  "SELECT company.cpn_id,company.cpn_name,company.cpn_address,company.cpn_email,company.cpn_phnumber,department.dpm_name,req.req_number
   FROM company
   INNER JOIN req on req.cpn_id = company.cpn_id
   INNER JOIN department on department.dpm_id = req.dpm_id" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('main_menu_cpn',$data);
}

 

 

 
 
}