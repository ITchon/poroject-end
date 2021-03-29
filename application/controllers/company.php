<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Company extends CI_Controller {
 
 
   public function __construct()
   {
       parent::__construct();
       $this->load->view('header2');
       $this->load->model('model');
       
       
       
   }

public function index(){
   $cpn_id = $this->session->userdata('cpn_id');
   $qry_inp =  "SELECT student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status,accept_req.ac_id
      FROM accept_req
      left JOIN req on req.req_id = accept_req.req_id
      left JOIN company on company.cpn_id = req.cpn_id
      left JOIN student on student.std_id = accept_req.std_id
      left JOIN class on class.cls_id = student.cls_id
      left JOIN department on department.dpm_id = req.dpm_id where company.cpn_id = $cpn_id  ";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('head_main');
   $this->load->view('cpn_sidebar');
   $this->load->view('main_menu_cpn',$data);
   
}
public function index2(){  
   $std_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_data_std_cnp($std_id);
   $this->load->view('head_main');
   $this->load->view('cpn_sidebar');
   $this->load->view('main_data_cpn',$data);
}
public function cpn_accept_std(){   
   $std_id = $this->uri->segment('3');
   $data = $this->model->chk_cpn_insert_std($std_id);
  if($data[0]->ac_status != 0){
   $this->session->set_flashdata
      ('failed','<div class="alert alert-warning">
                        <span>  
               <b>คุณได้รับนักศึกษาคนนี้เข้าฝึกงานแล้ว !!!</span> 
      </div>');
      redirect('company');  
 }else{
   $data2 = $this->model->cpn_accept_std($std_id);
   $this->session->set_flashdata
      ('success','<div class="alert alert-success">
                        <span>  
               <b>รับนักศึกษาเข้าฝึกงานเรียบร้อย</span> 
      </div>');
      
      redirect('company');  
 }

 
  
}

public function cancel_cpn_accept_std(){   
   $std_id = $this->uri->segment('3');
   $data = $this->model->chk_cpn_insert_std($std_id);
  if($data[0]->ac_status == 0){
   $this->session->set_flashdata
      ('failed','<div class="alert alert-warning">
                        <span>  
               <b>คุณได้ยกเลิกคำร้องของนักเรียนคนนี้แล้ว !!!</span> 
      </div>');
      redirect('company');  
 }else{
   $data2 = $this->model->cpn_cancel_accept_std($std_id);
   $this->session->set_flashdata
      ('success','<div class="alert alert-success">
                        <span>  
               <b>ยกเลิกสำเร็จ</span> 
      </div>');
      
      redirect('company');  
 }

 
  
}


public function insert_req_cpn_f(){
   $cpn_id =$this->session->userdata('cpn_id');
   $data['total'] =$this->model->count_req_cpn_sql($cpn_id);
   $sql="SELECT * FROM department";
   $query = $this->db->query($sql); 
   $data['result1'] = $query->result();
   $this->load->view('head_cpn');
   $this->load->view('cpn_sidebar');
   $this->load->view('insert_req_cpn',$data);
}

public function insert_req_cpn_r(){
   $cpn_id =$this->session->userdata('cpn_id');
   $dpm_id   = $this->input->post('dpm_id');
   $cls_id   = $this->input->post('cls_id');
   $req_number   = $this->input->post('req_number');
   $req_sex      = $this->input->post('req_sex');
   $req_glevel      = $this->input->post('req_glevel');
   $id = $this->model->insert_req_cpn($dpm_id,$req_number,$cpn_id,$req_sex,$req_glevel);
   redirect('company/index_show_cpn_req','refresh');
}
public function delete_ac_f($ac_id)
   {
      
      $result = $this->model->del_ac_p($ac_id);
      

      

		if($result!=FALSE)
		{
            redirect('company/index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }
 
   public function registerindex(){
    
      
      $this->load->view('add_cpn');
      
      
   }
  
   public function registercpn(){
      $config['upload_path']   = './uploads/pic'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 0; 
      $config['max_width']     = 0; 
      $config['max_height']    = 0;  
      $config['overwrite']     = TRUE;

      // $config['encrypt_name']  = true;

      $this->load->library('upload', $config);
      
      $file = $_FILES['cpn_img']['name'];
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('cpn_img')) {
         redirect('bilateral/insert_student_index'); 

      }else{
      $cpn_name =  $this->input->post('cpn_name');
     $cpn_address=  $this->input->post('cpn_address');
     $cpn_email =  $this->input->post('cpn_email');
     $cpn_phnumber=  $this->input->post('cpn_phnumber');
      $cpn_img =  $this->input->post('cpn_img');
      if(!empty($_FILES['cpn_img']['name'])) {
                  
         $tempFileLogo = $_FILES['cpn_img']['name'];
         $fileNameLogo = iconv('UTF-8','TIS-620',$_FILES['cpn_img']['name']);
         $arrStrLogo = explode(".", $fileNameLogo);
         $fileNameLogo = $arrStrLogo[0].".".$arrStrLogo[1];


         $fileNameLogo = preg_replace('/\s+/', '_', $fileNameLogo);
         //$targetPathLogo = 'F:\inetpub\wwwroot\PICKING_SYSTEM\uploads\pic\\';
         $targetPathLogo = 'C:\AppServ\www\project_end_1\uploads\pic';
         // $targetPathLogo = APPPATH . 'upload/pic/';
         $targetFileLogo = $targetPathLogo . $fileNameLogo ;
         move_uploaded_file($tempFileLogo, $targetFileLogo);

         // $p['pathlogo'] = "http://192.168.10.151/wifi_advertise/upload/pic/".$fileNameLogo;
         $cpn_img = ''.$fileNameLogo;


      }
      $id = $this->model->insert_registercpn($cpn_name,$cpn_address,$cpn_email,$cpn_phnumber,$cpn_img);
      $data = $this->model->insert_user($cpn_email,$cpn_phnumber,'company',$id);
      redirect('login');
      }
   }
 
 
   

   public function index_show_cpn_req(){
      $cpn_id = $this->session->userdata('cpn_id');
      $qry_inp =  "SELECT req.req_id,req.req_sex,req.req_glevel,company.cpn_id,company.cpn_name,company.cpn_add,company.cpn_email,company.cpn_phnumber,department.dpm_name,req.req_number
      FROM company
      INNER JOIN req on req.cpn_id = company.cpn_id
      INNER JOIN department on department.dpm_id = req.dpm_id WHERE company.cpn_id = $cpn_id" ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('head_cpn');
      $this->load->view('cpn_sidebar');
      $this->load->view('cpn_show_req',$data);
   }
   public function index_show_cpn(){
      $cpn_id = $this->session->userdata('cpn_id');
      $qry_inp =  "SELECT req.req_id,req.req_sex,req.req_glevel,company.cpn_id,company.cpn_name,company.cpn_add,company.cpn_email,company.cpn_phnumber,department.dpm_name,req.req_number
      FROM company
      INNER JOIN req on req.cpn_id = company.cpn_id
      INNER JOIN department on department.dpm_id = req.dpm_id " ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('head_cpn');
      $this->load->view('cpn_sidebar');
      $this->load->view('cpn_show_cpn',$data);
   }
   public function index_show_cpn_req_data(){  
      $req_id = $this->uri->segment('3');
     $data['result'] = $this->model->select_main_data_cpn($req_id);
     $this->load->view('head_cpn');
      $this->load->view('cpn_sidebar');
   $this->load->view('cpn_req_data',$data);
}
public function delete_cpn_req_data($req_id)
{
 $result = $this->model->del_req_p($req_id);
 if($result!=FALSE)
 {
       redirect('company/index_show_cpn_req','refresh');
 }
 else
 {
     echo "<script>alert('Something wrong')</script>";
      redirect('manage_student','refresh');
 }
}

public function show_cpn_data(){
   $id = $this->uri->segment('3');
     $data['result'] = $this->model->select_main_data($id);
     $this->load->view('head_cpn');
      $this->load->view('cpn_sidebar');
   $this->load->view('cpn_see_data_cpn',$data);
}

public function index_show_cpn_private(){
   $cpn_id = $this->session->userdata('cpn_id');
   $qry_inp =  "SELECT * FROM company where company.cpn_id = $cpn_id ";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('head_cpn');
   $this->load->view('cpn_sidebar');
   $this->load->view('private_cpn',$data);
   
}
public function count_req_cpn(){
   $data['total'] = $this->model->count_req_cpn_sql();
 }


}
?>