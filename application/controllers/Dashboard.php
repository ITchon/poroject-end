<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {


		 
	public function __construct()
	{
		parent::__construct();
        $this->load->view('header');
        $this->load->view('menu');
	}
	public function home(){
        $this->load->view('manage');
	}
}
