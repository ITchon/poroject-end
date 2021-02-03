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

 public function registerindex(){
    
    $this->load->view('add_cpn');
    
    
 }


 
 
}