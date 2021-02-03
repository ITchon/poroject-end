<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Student extends CI_Controller {
 
 
public function __construct()
    {
        parent::__construct();
        $this->load->view('header2');
        $this->load->model('model');
        $this->model->chk_sessionstudent();
        $this->load->view('head');
        $this->load->view('sidebar');
    }
 
 public function index(){
    
    $this->load->view('admin_menu');
    
 }




 
 
}