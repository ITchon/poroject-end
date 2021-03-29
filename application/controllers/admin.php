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
   $data['count_std'] = $this->model->count_std();
   $data['count_cpn'] = $this->model->count_cpn();
   $data['count_tch'] = $this->model->count_tch();
   $data['count_dpm'] = $this->model->count_dpm();
   $data['count_user'] = $this->model->count_user();
   $data['count_cls'] = $this->model->count_cls();
    $this->load->view('admin_menu',$data);
 }

 public function show_user_index(){
   $qry_inp =  "SELECT `user_id`,`user_name`, `user_pass`, `user_group`, `user_status`, `id` FROM `user`" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_user',$data);
}
public function show_company_index(){
   $qry_inp =  "SELECT company.cpn_id,company.cpn_name,cpn_add, cpn_email, cpn_phnumber 
   FROM company";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_company',$data);
}

public function show_teacher_index(){
   $qry_inp =  "SELECT `tch_id`,`tch_name`, `tch_tel`, `tch_email`, `tch_card` FROM `teacher`" ;
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_teacher',$data);
}

public function show_student_index(){
   $qry_inp =  "SELECT student.std_id,c.cls_name,student.title,student.std_fname,student.std_lname,student.std_code,
   student.std_birthday,student.std_age,student.std_sex,department.dpm_name,teacher.tch_name,student.std_img
   FROM student
   INNER JOIN class AS c on student.cls_id = c.cls_id
   INNER JOIN department on department.dpm_id = c.dpm_id
   INNER JOIN teacher on teacher.tch_id = c.tch_id";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_student',$data);
}

public function insert_student_index(){
   $qry_inp =  "SELECT department.dpm_id ,department.dpm_name,class.cls_id,class.cls_glevel,class.cls_name,class.cls_group
   FROM class
   INNER JOIN department on department.dpm_id = class.dpm_id";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('insert_student',$data);
}

public function insert_student()
	{  
      $config['upload_path']   = './uploads/pic'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 0; 
      $config['max_width']     = 0; 
      $config['max_height']    = 0;  
      $config['overwrite']     = TRUE;

      // $config['encrypt_name']  = true;

      $this->load->library('upload', $config);
      
      $file = $_FILES['std_img']['name'];
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('std_img')) {
         redirect('admin/insert_student_index'); 

      }else{
		   $title    = $this->input->post('title'); 
         $std_fname    = $this->input->post('std_fname');
         $std_lname    = $this->input->post('std_lname');
         $std_idcard    = $this->input->post('std_idcard');
         $std_code      = $this->input->post('std_code');
         $std_birthday    = $this->input->post('std_birthday');
         $std_sex    = $this->input->post('std_sex');
		   $std_age  = $this->input->post('std_age');
		   $cls_id   = $this->input->post('cls_id');
         $std_img   = $this->input->post('std_img');
         if(!empty($_FILES['std_img']['name'])) {
                  
            $tempFileLogo = $_FILES['std_img']['name'];
            $fileNameLogo = iconv('UTF-8','TIS-620',$_FILES['std_img']['name']);
            $arrStrLogo = explode(".", $fileNameLogo);
            $fileNameLogo = $arrStrLogo[0].".".$arrStrLogo[1];


            $fileNameLogo = preg_replace('/\s+/', '_', $fileNameLogo);
            //$targetPathLogo = 'F:\inetpub\wwwroot\PICKING_SYSTEM\uploads\pic\\';
            $targetPathLogo = 'C:\AppServ\www\project_end_1\uploads\pic';
            // $targetPathLogo = APPPATH . 'upload/pic/';
            $targetFileLogo = $targetPathLogo . $fileNameLogo ;
            move_uploaded_file($tempFileLogo, $targetFileLogo);

            // $p['pathlogo'] = "http://192.168.10.151/wifi_advertise/upload/pic/".$fileNameLogo;
            $std_img = ''.$fileNameLogo;


         }
         // $dpm_name = $this->input->post('dpm_name');
         // $tch_name = $this->input->post('tch_name');
         $id = $this->model->insert_student($title ,$std_fname ,$std_lname,$std_idcard,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id,$std_img);

        ########################
        $user_name = $std_code;
        $user_pass = $std_birthday;
        $user_group = "student";
        
        $this->model->insert_user($user_name,$user_pass,$user_group,$id);
        ########################
        redirect('admin/show_student_index');
	}
}


   public function edit_student()
   {
         $id = $this->uri->segment('3'); 
         $data['result'] = $this->model->selectOnestudent($id);
         $sql = "SELECT department.dpm_id,department.dpm_name,class.cls_id,cls_name,cls_group,cls_glevel
         FROM class
         INNER JOIN department on department.dpm_id = class.dpm_id ";
         $query = $this->db->query($sql); 
         $data['result_cls'] = $query->result();
		   $this->load->view('edit_student',$data);
   }
   public function edit_student_p()
	{
      $config['upload_path']   = './uploads/pic'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 0; 
      $config['max_width']     = 0; 
      $config['max_height']    = 0;  
      $config['overwrite']     = TRUE;

      // $config['encrypt_name']  = true;

      $this->load->library('upload', $config);
      
      $file = $_FILES['std_img']['name'];
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('std_img')) {
         redirect('bilateral/insert_student_index'); 

      }else{
		   $title    = $this->input->post('title'); 
         $std_fname    = $this->input->post('std_fname');
         $std_lname    = $this->input->post('std_lname');
         $std_idcard      = $this->input->post('std_idcard');
         $std_code      = $this->input->post('std_code');
         $std_birthday    = $this->input->post('std_birthday');
         $std_sex    = $this->input->post('std_sex');
		   $std_age  = $this->input->post('std_age');
		   $cls_id   = $this->input->post('cls_id');
         $std_id = $this->input->post('std_id');
         $std_img = $this->input->post('std_img');
         if(!empty($_FILES['std_img']['name'])) {
                  
            $tempFileLogo = $_FILES['std_img']['name'];
            $fileNameLogo = iconv('UTF-8','TIS-620',$_FILES['std_img']['name']);
            $arrStrLogo = explode(".", $fileNameLogo);
            $fileNameLogo = $arrStrLogo[0].".".$arrStrLogo[1];


            $fileNameLogo = preg_replace('/\s+/', '_', $fileNameLogo);
            //$targetPathLogo = 'F:\inetpub\wwwroot\PICKING_SYSTEM\uploads\pic\\';
            $targetPathLogo = 'C:\AppServ\www\project_end_1\uploads\pic';
            // $targetPathLogo = APPPATH . 'upload/pic/';
            $targetFileLogo = $targetPathLogo . $fileNameLogo ;
            move_uploaded_file($tempFileLogo, $targetFileLogo);

            // $p['pathlogo'] = "http://192.168.10.151/wifi_advertise/upload/pic/".$fileNameLogo;
            $std_img = ''.$fileNameLogo;


         }
         $id = $this->model->edit_student($title ,$std_fname ,$std_lname,$std_idcard ,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id , $std_id,$std_img);
        redirect('Admin/show_student_index');
      }
	}


   public function edit_passwd()
   {
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->selectOnepass($id);
        $qry_inp =  "SELECT * FROM class";
        $query = $this->db->query($qry_inp); 
        $data['result_cls'] = $query->result();
		$this->load->view('adminedit_pass',$data);
   }
   public function edit_passwd_p()
	{

      $user_id   = $this->input->post('user_id');
      $user_pass = $this->input->post('user_pass');

         $id = $this->model->edit_passwd($user_pass ,$user_id );

        redirect('Admin/show_user_index');
	}


   

   public function delete_student($std_id)
   {
      
      $result = $this->model->del_std_p($std_id);
      

      

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

   public function delete_user($user_id)
   {
      $result = $this->model->del_user($user_id);
		if($result!=FALSE)
		{
            redirect('Admin/show_user_index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('show_user_index','refresh');
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
		   $cpn_name    = $this->input->post('cpn_name');
         $cpn_add   = $this->input->post('cpn_add');
         $cpn_email      = $this->input->post('cpn_email');
         $cpn_phnumber    = $this->input->post('cpn_phnumber');
         $cpn_img    = $this->input->post('cpn_img');
         
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
         $id = $this->model->insert_company($cpn_name ,$cpn_add ,$cpn_email ,$cpn_phnumber,$cpn_img);
         $user_name = $cpn_email;
         $user_pass = $cpn_phnumber;
         $user_group = "company";
         $this->model->insert_user($user_name,$user_pass,$user_group,$id);
       redirect('admin/show_company_index');
	   }
      
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
      $cpn_id    = $this->input->post('cpn_id');
      $cpn_name    = $this->input->post('cpn_name');
      $cpn_add   = $this->input->post('cpn_add');
      $cpn_email      = $this->input->post('cpn_email');
      $cpn_phnumber    = $this->input->post('cpn_phnumber');
      $cpn_img    = $this->input->post('cpn_img');
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
         $id = $this->model->edit_company($cpn_name ,$cpn_add ,$cpn_email ,$cpn_phnumber,$cpn_id,$cpn_img );

        redirect('Admin/show_company_index');
      }
	}

   public function delete_company($cpn_id)
   {

      $result = $this->model->del_cpn_p($cpn_id);

      
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
      $config['upload_path']   = './uploads/pic'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 0; 
      $config['max_width']     = 0; 
      $config['max_height']    = 0;  
      $config['overwrite']     = TRUE;

      // $config['encrypt_name']  = true;

      $this->load->library('upload', $config);
      
      $file = $_FILES['tch_img']['name'];
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('tch_img')) {
         redirect('bilateral/insert_student_index'); 

      }else{
         $tch_name    = $this->input->post('tch_name');
         $tch_tel   = $this->input->post('tch_tel');
         $tch_email      = $this->input->post('tch_email');
         $tch_card      = $this->input->post('tch_card');
         $tch_img     = $this->input->post('tch_img');
         if(!empty($_FILES['tch_img']['name'])) {
                  
            $tempFileLogo = $_FILES['tch_img']['name'];
            $fileNameLogo = iconv('UTF-8','TIS-620',$_FILES['tch_img']['name']);
            $arrStrLogo = explode(".", $fileNameLogo);
            $fileNameLogo = $arrStrLogo[0].".".$arrStrLogo[1];


            $fileNameLogo = preg_replace('/\s+/', '_', $fileNameLogo);
            //$targetPathLogo = 'F:\inetpub\wwwroot\PICKING_SYSTEM\uploads\pic\\';
            $targetPathLogo = 'C:\AppServ\www\project_end_1\uploads\pic';
            // $targetPathLogo = APPPATH . 'upload/pic/';
            $targetFileLogo = $targetPathLogo . $fileNameLogo ;
            move_uploaded_file($tempFileLogo, $targetFileLogo);

            // $p['pathlogo'] = "http://192.168.10.151/wifi_advertise/upload/pic/".$fileNameLogo;
            $tch_img = ''.$fileNameLogo;


         }
         $id = $this->model->insert_teacher($tch_name ,$tch_tel ,$tch_email,$tch_card,$tch_img );
         $user_name = $tch_email;
         $user_pass = $tch_card;
         $user_group = "teacher";
         $this->model->insert_user($user_name,$user_pass,$user_group,$id);
        ########################
        redirect('Admin/show_teacher_index');
	   }
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
      $config['upload_path']   = './uploads/pic'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 0; 
      $config['max_width']     = 0; 
      $config['max_height']    = 0;  
      $config['overwrite']     = TRUE;

      // $config['encrypt_name']  = true;

      $this->load->library('upload', $config);
      
      $file = $_FILES['tch_img']['name'];
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('tch_img')) {
         redirect('bilateral/insert_student_index'); 

      }else{
      $tch_id    = $this->input->post('tch_id');
      $tch_name    = $this->input->post('tch_name');
      $tch_tel    = $this->input->post('tch_tel');
      $tch_email   = $this->input->post('tch_email');
      $tch_card   = $this->input->post('tch_card');
      $tch_img   = $this->input->post('tch_img');
      if(!empty($_FILES['tch_img']['name'])) {
                  
         $tempFileLogo = $_FILES['tch_img']['name'];
         $fileNameLogo = iconv('UTF-8','TIS-620',$_FILES['tch_img']['name']);
         $arrStrLogo = explode(".", $fileNameLogo);
         $fileNameLogo = $arrStrLogo[0].".".$arrStrLogo[1];


         $fileNameLogo = preg_replace('/\s+/', '_', $fileNameLogo);
         //$targetPathLogo = 'F:\inetpub\wwwroot\PICKING_SYSTEM\uploads\pic\\';
         $targetPathLogo = 'C:\AppServ\www\project_end_1\uploads\pic';
         // $targetPathLogo = APPPATH . 'upload/pic/';
         $targetFileLogo = $targetPathLogo . $fileNameLogo ;
         move_uploaded_file($tempFileLogo, $targetFileLogo);

         // $p['pathlogo'] = "http://192.168.10.151/wifi_advertise/upload/pic/".$fileNameLogo;
         $tch_img = ''.$fileNameLogo;


      }
         $id = $this->model->edit_teacher($tch_id,$tch_name ,$tch_tel ,$tch_email,$tch_card,$tch_img);

        redirect('Admin/show_teacher_index');
      }
	}

   public function delete_teacher($tch_id)
   {

      $result = $this->model->del_tch_p($tch_id);

      
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

   
   public function show_class_index()
   {

      $qry_inp =  "SELECT c.cls_id,c.cls_name,c.cls_group,department.dpm_name,teacher.tch_name,c.cls_glevel
      FROM class AS c
      INNER JOIN teacher on teacher.tch_id = c.tch_id
      INNER JOIN department on department.dpm_id = c.dpm_id";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('show_class',$data);
   }
   
   

   public function show_department_index()
   {
      $qry_inp =  "SELECT * FROM department";
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('show_department',$data);
   }
   public function insert_department_index(){
      $qry_inp =  "SELECT * FROM department" ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('insert_department',$data);
   }

   public function insert_department()
	{
         
         $dpm_name    = $this->input->post('dpm_name');
         $id = $this->model->insert_department($dpm_name);
        redirect('Admin/show_department_index');
	}
   public function edit_department()
   {
         $id = $this->uri->segment('3'); 
        $data['result'] = $this->model->selectOnedepartment($id);
		   $this->load->view('edit_department',$data);
   }
   public function edit_department_p()
	{
         $dpm_id    = $this->input->post('dpm_id');
         $dpm_name    = $this->input->post('dpm_name');
         $this->model->edit_department($dpm_id,$dpm_name);

        redirect('Admin/show_department_index');
	}

   public function delete_department($dpm_id)
   {

      $result = $this->model->del_dpm_p($dpm_id);

      
		if($result!=FALSE)
		{
            redirect('Admin/show_department_index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }
   


   public function insert_class_index(){
      $qry_inp =  "SELECT * FROM class " ;
      $query = $this->db->query($qry_inp); 
      $data['result_class'] = $query->result();

      $qry_inp =  "SELECT * FROM department ";
      $query = $this->db->query($qry_inp); 
      $data['result_dpm'] = $query->result();

      $qry_inp =  "SELECT * FROM teacher";
      $query = $this->db->query($qry_inp); 
      $data['result_tch'] = $query->result();
      $this->load->view('insert_class',$data);
   }
   public function insert_class_r()
	{
         
         $cls_name    = $this->input->post('cls_name');
         $cls_group   = $this->input->post('cls_group');
         $dpm_id      = $this->input->post('dpm_id');
         $tch_id      = $this->input->post('tch_id');
         $cls_glevel      = $this->input->post('cls_glevel');
         $id = $this->model->insert_class($cls_name ,$cls_group ,$dpm_id,$tch_id,$cls_glevel);
        redirect('Admin/show_class_index');
	}
   
   public function edit_class()
   {
         $id = $this->uri->segment('3'); 
         $data['result'] = $this->model->selectOneclass($id);
         $qry_inp =  "SELECT * FROM department ";
         $query = $this->db->query($qry_inp); 
         $data['result_dpm'] = $query->result();

         $qry_inp =  "SELECT * FROM teacher";
         $query = $this->db->query($qry_inp); 
         $data['result_tch'] = $query->result();

         $qry_inp =  "SELECT * FROM class";
         $query = $this->db->query($qry_inp); 
         $data['result_cls'] = $query->result();
         $this->load->view('edit_class',$data);
   }
   public function edit_class_p()
	{
      $cls_id    = $this->input->post('cls_id');
      $cls_name    = $this->input->post('cls_name');
      $cls_group    = $this->input->post('cls_group');
      $dpm_id    = $this->input->post('dpm_id');
      $cls_glevel    = $this->input->post('cls_glevel');
      $tch_id    = $this->input->post('tch_id');
         $id = $this->model->edit_class($cls_id ,$cls_name ,$cls_group,$dpm_id,$cls_glevel,$tch_id);

        redirect('Admin/show_class_index');
	}


   public function delete_class($cls_id)
   {

      $result = $this->model->del_class_p($cls_id);

      
		if($result!=FALSE)
		{
            redirect('Admin/show_class_index','refresh');
		}
		else
		{
		    echo "<script>alert('Something wrong')</script>";
        	redirect('manage_student','refresh');
		}
   }

   public function index2(){
      $qry_inp =  "SELECT * FROM `company`" ;
      $query = $this->db->query($qry_inp); 
      $data['result'] = $query->result();
      $this->load->view('admin_show_cpn',$data);
   
}

public function index3(){
   $cpn_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_btr_cpn_data($cpn_id);
$this->load->view('admin_show_cpn_data',$data);

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
        redirect('admin/index2','refresh');  
   }else{
      $data1  = $this->model->btr_accept_cpn($cpn_id);
     $this->session->set_flashdata
        ('success','<div class="alert alert-success">
                          <span>  
                 <b>อนุมัติบริษัทสำเร็จ</span> 
        </div>');
        
        redirect('admin/index2','refresh');  
   }
   
   
     
}

public function cancel_accept_cpn(){  
$cpn_id = $this->uri->segment('3'); 
$data  = $this->model->chk_btr_insert_cpn($cpn_id);
if($data[0]->cpn_status == 0){
  $this->session->set_flashdata
     ('failed','<div class="alert alert-warning">
                       <span>  
              <b>ยกเลิกอนุมัติไปแล้ว !!</span> 
     </div>');
     redirect('admin/index2','refresh');  
}else{
   $data1  = $this->model->btr_cancel_accept_cpn($cpn_id);
  $this->session->set_flashdata
     ('success','<div class="alert alert-success">
                       <span>  
              <b>ยกเลิกอนุมัติสำเร็จ</span> 
     </div>');
     
     redirect('admin/index2','refresh');  
}
 
}
public function delete_cpn_ac_std($ac_id)
  {
     
     $result = $this->model->del_cpn_p($ac_id);
     

     

     if($result!=FALSE)
     {
         $this->session->set_flashdata
           ('success_del','<div class="alert alert-success">
                             <span>  
                    <b>ลบสำเร็จ</span> 
           </div>');
           redirect('admin/index2','refresh');
     }
     else
     {
         echo "<script>alert('Something wrong')</script>";
          redirect('manage_student','refresh');
     }
  }


  public function del_cpn_ac_std($ac_id)
  {
     
     $result = $this->model->del_cpn_ac_std_p($ac_id);
     

     

     if($result!=FALSE)
     {
         $this->session->set_flashdata
           ('success_del','<div class="alert alert-success">
                             <span>  
                    <b>ลบสำเร็จ</span> 
           </div>');
           redirect('admin/show_cpn_ac_std','refresh');
     }
     else
     {
         echo "<script>alert('Something wrong')</script>";
          redirect('manage_student','refresh');
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
           redirect('admin/index2','refresh');
     }
     else
     {
         echo "<script>alert('Something wrong')</script>";
          redirect('manage_student','refresh');
     }
  }



  public function show_std_data(){  
   $std_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_data_std_cnp($std_id);
   
   $this->load->view('admin_show_std_data',$data);
}




  public function accept_std(){   
   $std_id = $this->uri->segment('3');
  $data = $this->model->chk_btr_insert_std($std_id);
  if($data[0]->std_status != 0){
    $this->session->set_flashdata
       ('failed','<div class="alert alert-warning">
                         <span>  
                <b>อนุมัตินักเรียนคนนี้ไปแล้ว !!</span> 
       </div>');
       redirect('admin/index4','refresh');  
  }else{
    $data['result'] = $this->model->accept_std($std_id);
    $this->session->set_flashdata
       ('success','<div class="alert alert-success">
                         <span>  
                <b>อนุมัติสำเร็จ</span> 
       </div>');
       
       redirect('admin/index4','refresh');  
  }
  redirect('admin/index4','refresh');
}

public function cancel_accept_std(){  
 $std_id = $this->uri->segment('3'); 
 $data  = $this->model->chk_btr_insert_std($std_id);
 if($data[0]->std_status == 0){
   $this->session->set_flashdata
      ('failed','<div class="alert alert-warning">
                        <span>  
               <b>ยกเลิกอนุมัตินักเรียนคนนี้ไปแล้ว !!</span> 
      </div>');
      redirect('admin/index4','refresh');  
 }else{
    $data1  = $this->model->btr_cancel_accept_std($std_id);
   $this->session->set_flashdata
      ('success','<div class="alert alert-success">
                        <span>  
               <b>ยกเลิกอนุมัติสำเร็จ</span> 
      </div>');
      
      redirect('admin/index4','refresh');  
 }
 
 
   
}

public function delete_student_ac_std($std_id)
{
 $result = $this->model->del_std_p($std_id);
 if($result!=FALSE)
 {
       redirect('admin/index4','refresh');
 }
 else
 {
     echo "<script>alert('Something wrong')</script>";
      redirect('manage_student','refresh');
 }
}
public function index4(){
   $qry_inp =  "SELECT student.std_id,c.cls_name,student.title,student.std_fname,student.std_lname,student.std_code,
   student.std_birthday,student.std_age,student.std_sex,student.std_status,department.dpm_name,student.std_img
   FROM student
   INNER JOIN class AS c on student.cls_id = c.cls_id
   INNER JOIN department on department.dpm_id = c.dpm_id";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
   $this->load->view('admin_show_acc_std',$data);
  }


  public function show_cpn_ac_std(){
   
   $qry_inp =  "SELECT company.cpn_name,student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status,accept_req.ac_id
      FROM accept_req
      left JOIN req on req.req_id = accept_req.req_id
      left JOIN company on company.cpn_id = req.cpn_id
      left JOIN student on student.std_id = accept_req.std_id
      left JOIN class on class.cls_id = student.cls_id
      left JOIN department on department.dpm_id = req.dpm_id ";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
  
   $this->load->view('admin_show_menu_cpn_ac_std',$data);
   
}
public function show_cpn_ac_std2(){  
   $std_id = $this->uri->segment('3');
   $data['result'] = $this->model->select_main_data_std_cnp($std_id);
   
   $this->load->view('admin_show_data_cpn_ac_std',$data);
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
      redirect('admin/show_cpn_ac_std');  
 }else{
   $data2 = $this->model->cpn_accept_std($std_id);
   $this->session->set_flashdata
      ('success','<div class="alert alert-success">
                        <span>  
               <b>รับนักศึกษาเข้าฝึกงานเรียบร้อย</span> 
      </div>');
      
      redirect('admin/show_cpn_ac_std');  
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
      redirect('admin/show_cpn_ac_std');  
 }else{
   $data2 = $this->model->cpn_cancel_accept_std($std_id);
   $this->session->set_flashdata
      ('success','<div class="alert alert-success">
                        <span>  
               <b>ยกเลิกสำเร็จ</span> 
      </div>');
      
      redirect('admin/show_cpn_ac_std');  
 }

 
  
}

public function delete_cpn_req_data($req_id)
{
 $result = $this->model->del_req_p($req_id);
 if($result!=FALSE)
 {
       redirect('admin/show_cpn_ac_std','refresh');
 }
 else
 {
     echo "<script>alert('Something wrong')</script>";
      redirect('manage_student','refresh');
 }
}
public function download(){
  
   $this->load->view('admin_dowload_rp');
   
}
public function show_std_rp(){
   
   $qry_inp =  "SELECT company.cpn_name,student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex
   ,department.dpm_name,accept_req.ac_status,accept_req.ac_id
      FROM accept_req
      left JOIN req on req.req_id = accept_req.req_id
      left JOIN company on company.cpn_id = req.cpn_id
      left JOIN student on student.std_id = accept_req.std_id
      left JOIN class on class.cls_id = student.cls_id
      left JOIN department on department.dpm_id = req.dpm_id ";
   $query = $this->db->query($qry_inp); 
   $data['result'] = $query->result();
  
   $this->load->view('show_std_rp',$data);
   
}

}
?>