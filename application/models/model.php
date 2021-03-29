
<?php

class Model extends CI_Model
{

  


  public function insert_student($title ,$std_fname ,$std_lname,$std_idcard,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id,$std_img)
        {
            $sql ="INSERT INTO student (
                        cls_id,
                        title,
                        std_fname,
                        std_lname,
                        std_idcard,
                        std_code,
                        std_birthday,
                        std_age,
                        std_sex,
                        std_status,
                        std_img
                        )
                VALUES ('$cls_id','$title','$std_fname','$std_lname','$std_idcard','$std_code','$std_birthday','$std_age','$std_sex','0','$std_img');";          
                $query = $this->db->query($sql);  
                if($query)
                {
                return $this->db->insert_id();
                }
                else{
                return false;
                } 
        }

        public function edit_class($cls_id ,$cls_name ,$cls_group,$dpm_id,$cls_glevel,$tch_id)
        {
            $sql ="UPDATE class SET  
                                        cls_name ='$cls_name' ,
                                        cls_group ='$cls_group',
                                        cls_group ='$cls_group' ,
                                        dpm_id ='$dpm_id' ,
                                        cls_glevel ='$cls_glevel' ,
                                        tch_id ='$tch_id'
                                        WHERE cls_id = '$cls_id';";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }

   public function edit_student($title ,$std_fname ,$std_lname,$std_idcard ,$std_code ,$std_birthday ,$std_sex ,$std_age ,$cls_id , $std_id,$std_img)
        {
            $sql ="UPDATE `student` SET  
                                         cls_id ='$cls_id' ,
                                         title ='$title' ,
                                         std_fname ='$std_fname' ,
                                         std_lname ='$std_lname' ,
                                         std_idcard ='$std_idcard' ,
                                         std_code ='$std_code' ,  
                                         std_birthday ='$std_birthday' ,
                                         std_age ='$std_age' ,
                                         std_sex ='$std_sex' ,
                                         std_img ='$std_img' 
                                        WHERE std_id = '$std_id';";          
                $exc_teacher = $this->db->query($sql);
                if ($exc_teacher)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }


        public function edit_passwd($user_pass ,$user_id )
        {
            $sql ="UPDATE user SET       user_pass ='$user_pass' ,
                                         user_status ='1'
                                         
                                         
                                        
                                        WHERE user_id = '$user_id';";          
                $exc_teacher = $this->db->query($sql);
                if ($exc_teacher)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }


 public function insert_company($cpn_name ,$cpn_add ,$cpn_email ,$cpn_phnumber,$cpn_img)
        {
            $sql ="INSERT INTO company (
                        cpn_name,
                        cpn_add,
                        cpn_email,
                        cpn_phnumber,
                        cpn_img,
                        cpn_status
                        )
                VALUES ('$cpn_name','$cpn_add','$cpn_email','$cpn_phnumber','$cpn_img','0');";          
                $query = $this->db->query($sql);  
                if($query)
                {
                return $this->db->insert_id();
                }
                else{
                return false;
                } 
        }

        public function show_main_menu($cpn_name ,$cpn_add ,$cpn_email ,$cpn_phnumber ,$cpn_id )
        {
            $sql ="UPDATE `company` SET  
                                         cpn_name ='$cpn_name' ,
                                         cpn_add ='$cpn_add' ,
                                         cpn_email ='$cpn_email' ,
                                         cpn_phnumber ='$cpn_phnumber' 
                                        
                                        WHERE cpn_id = '$cpn_id';";          
                $exc_teacher = $this->db->query($sql);
                if ($exc_teacher)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }

        public function edit_company($cpn_name ,$cpn_add ,$cpn_email ,$cpn_phnumber ,$cpn_id,$cpn_img  )
        {
            $sql ="UPDATE `company` SET  
                                         cpn_name ='$cpn_name' ,
                                         cpn_add ='$cpn_add' ,
                                         cpn_email ='$cpn_email' ,
                                         cpn_phnumber ='$cpn_phnumber' ,
                                         cpn_img ='$cpn_img' 
                                        WHERE cpn_id = '$cpn_id';";          
                $exc_teacher = $this->db->query($sql);
                if ($exc_teacher)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }
        public function insert_teacher($tch_name ,$tch_tel ,$tch_email,$tch_card,$tch_img)
        {
            $sql ="INSERT INTO teacher (
                        tch_name,
                        tch_tel,
                        tch_email,
                        tch_card,
                        tch_img
                        )
                VALUES ('$tch_name','$tch_tel','$tch_email','$tch_card','$tch_img');";          
                $query = $this->db->query($sql);  
                if($query)
                {
                return $this->db->insert_id();
                }
                else{
                return false;
                } 
        }

        public function insert_class($cls_name ,$cls_group ,$dpm_id,$tch_id,$cls_glevel)
        {
            $sql ="INSERT INTO class (
                        cls_name,
                        cls_group,
                        dpm_id,
                        tch_id,
                        cls_glevel
                        )
                VALUES ('$cls_name','$cls_group','$dpm_id','$tch_id','$cls_glevel');";          
                $query = $this->db->query($sql);  
                if($query)
                {
                return $this->db->insert_id();
                }
                else{
                return false;
                } 
        }

        public function edit_department($dpm_id,$dpm_name)
        {
            $sql ="UPDATE `department` SET
                                         dpm_name ='$dpm_name'
                                         
                                        
                                        WHERE dpm_id = '$dpm_id';";          
                $exc_teacher = $this->db->query($sql);
                if ($exc_teacher)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }

        public function edit_teacher($tch_id,$tch_name ,$tch_tel ,$tch_email,$tch_card,$tch_img)
        {
            $sql ="UPDATE `teacher` SET  
                                         tch_name ='$tch_name' ,
                                         tch_tel ='$tch_tel' ,
                                         tch_email ='$tch_email',
                                         tch_card ='$tch_card',
                                         tch_img ='$tch_img'
                                        WHERE tch_id = '$tch_id';";          
                $exc_teacher = $this->db->query($sql);
                if ($exc_teacher)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }
      //   public function chk_sessionadmin() {  
      //     if($this->session->userdata('user_group')!="admin") {
      //       echo "<script>alert('Please Login')</script>";
      //       redirect('login','refresh');
      //       return FALSE;
      
      //     }else{    return TRUE;    }
      // }      

  public function chk_sessionadmin() {  
    if($this->session->userdata('user_group')!="admin") {
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
      return FALSE;

    }else{    return TRUE;    }
}

public function fetch_pass($session_id){
	$fetch_pass=$this->db->query("select * from user_login where id='$session_id'");
	$res=$fetch_pass->result();
	}
	function change_pass($session_id,$new_pass){
	$update_pass=$this->db->query("UPDATE user_login set pass='$new_pass'  where id='$session_id'");
	}


public function chk_sessionstudent() {  
  if($this->session->userdata('user_group')!="student") {
    echo "<script>alert('Please Login')</script>";
    redirect('login','refresh');
    return FALSE;

  }else{    return TRUE;    }
}

  public function chk_sessioncpn() {  
    if($this->session->userdata('user_group')!="company") {
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
      return FALSE;

    }else{    return TRUE;    }
}

  public function chk_sessiontch() {  
    if($this->session->userdata('user_group')!="teacher") {
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
      return FALSE;

    }else{    return TRUE;    }
}
public function chk_sessionbtr() {  
  if($this->session->userdata('user_group')!="bilateral") {
    echo "<script>alert('Please Login')</script>";
    redirect('login','refresh');
    return FALSE;

  }else{    return TRUE;    }
}

public function chk_username_registercpn($username) {  
       
  $sql ="SELECT * FROM user WHERE user_name='$username'";
 $query = $this->db->query($sql);
 if($query->num_rows()!=0) {
  echo '<script language="javascript">';
            echo 'alert("Username alrady exist.");';
            echo 'history.go(-1);';
            echo '</script>';
            exit();
     }
   else{       
   return false;
     }
}

public function chk_login($username,$userpass) {  
       
       $sql ="SELECT * FROM user WHERE user_name='$username' and user_pass='$userpass'";
      $query = $this->db->query($sql);
      if($query->num_rows()!=0) {
        $result = $query->result_array();
          return $result[0];  
          }
        else{       
        return false;
          }
}



public function insert_registercpn($cpn_name,$cpn_add,$cpn_email,$cpn_phnumber,$cpn_img) {  
  // $pass = base64_encode(trim($pass));
  $sql ="INSERT INTO company (
    cpn_name,
    cpn_add,
    cpn_email,
    cpn_phnumber,
    cpn_img,
    cpn_status
    )
VALUES ('$cpn_name','$cpn_add','$cpn_email','$cpn_phnumber','$cpn_img','0');";
$query = $this->db->query($sql);
if($query) {
    return $this->db->insert_id(); 
    }else{ 
    return false;
    }

}

public function insert_registertch($tch_name,$tch_tel,$tch_code) {  
  // $pass = base64_encode(trim($pass));
  $sql ="INSERT INTO `teacher` (`tch_name`,`tch_tel`,`tch_code`) 
  VALUES ('$tch_name','$tch_tel','$tch_code')";
$query = $this->db->query($sql);
if($query) {
    return $this->db->insert_id(); 
    }else{ 
    return false;
    }

}


public function insert_user($user_name,$user_pass,$user_group,$id){ 
  // $pass = base64_encode(trim($pass));
  $sql ="INSERT INTO `user`(`user_name`,`user_pass`,`user_group`,`user_status`,id) 
  VALUES ('$user_name','$user_pass','$user_group','0','$id')";
$query = $this->db->query($sql);
if($query) {
    return true;  
    }else{ 
    return false;
    }

}

public function get_cpn($cpn_id) {  
  // $pass = base64_encode(trim($pass));
  $sql ="SELECT * FROM company WHERE cpn_id='$cpn_id'"; 
$query = $this->db->query($sql);
$result = $query->result_array();
if($query) {
    return $result;  
    }else{ 
    return false;
    }

}

public function get_tch($tch_id) {  
  // $pass = base64_encode(trim($pass));
  $sql ="SELECT * FROM teacher WHERE tch_id='$tch_id'"; 
$query = $this->db->query($sql);
$result = $query->result_array();
if($query) {
    return $result;  
    }else{ 
    return false;
    }

}

public function block_for_teacher() {  
        if($this->session->userdata('std_id') || $this->session->userdata('contact_id')){
          echo "<script>";
            echo 'alert("Get back");';
            echo 'history.go(-1);';
            echo '</script>';
        }
}

public function block_for_contact() {  
        if($this->session->userdata('std_id') || $this->session->userdata('teacher_id')){
          echo "<script>";
            echo 'alert("Get back");';
            echo 'history.go(-1);';
            echo '</script>';
        }
}

public function chk_teacher($user,$pass) {  
    // $pass = base64_encode(trim($pass));
    $sql ="SELECT * FROM teacher WHERE th_code='$user' and tel='$pass'";
  $query = $this->db->query($sql);
  if($query->num_rows()!=0) {
    $result = $query->result_array();
      return $result[0];  
      }
    else{       
    return false;
      }
}

public function chk_admin($user,$pass) {  
    // $pass = base64_encode(trim($pass));
    $sql ="SELECT * FROM admin WHERE username='$user' and password='$pass'";
  $query = $this->db->query($sql);
  if($query->num_rows()!=0) {
    $result = $query->result_array();
      return $result[0];  
      }
    else{       
    return false;
      }
}

public function chk_contact($user,$pass) {  
    // $pass = base64_encode(trim($pass));
    $sql ="SELECT * FROM contact WHERE username='$user' and password='$pass'";
  $query = $this->db->query($sql);
  if($query->num_rows()!=0) {
    $result = $query->result_array();
      return $result[0];  
      }
    else{       
    return false;
      }
}

public function CheckSession()        
{
  if($this->session->userdata('std_id')){
    if($this->session->userdata('std_id')=="") {
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
   return FALSE;
  }
}

   else if($this->session->userdata('teacher_id')){
    if($this->session->userdata('teacher_id')==""){
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
   return FALSE;
    }
   }
    
   else if($this->session->userdata('admin_id')){
    if($this->session->userdata('admin_id')==""){
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
   return FALSE;
    }
   }

   else if($this->session->userdata('contact_id')){
    if($this->session->userdata('contact_id')==""){
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
   return FALSE;
    }
   }

   else if($this->session->userdata('fname') == ''){
      echo "<script>alert('Please Login')</script>";
      redirect('login','refresh');
   return FALSE;
   }
    else{    return TRUE;    }
}

public function del_user_p($user_id)
{

  $sqlEdt = "DELETE FROM user WHERE id = '$user_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}

public function del_ac_p($ac_id)
{

  $sqlEdt = "DELETE FROM accept_req WHERE ac_id = '$ac_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}
public function del_req_p($req_id)
{

  $sqlEdt = "DELETE FROM req WHERE req_id = '$req_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}

public function del_std_p($std_id)
{

  $sqlEdt = "DELETE FROM student WHERE std_id = '$std_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}
public function del_ac_std_p($ac_id)
{

  $sqlEdt = "DELETE FROM accept_req WHERE ac_id = '$ac_id  ';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}

public function del_cpn_p($cpn_id)
{

  $sqlEdt = "DELETE FROM company WHERE cpn_id = '$cpn_id  ';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}

public function del_cpn_ac_std_p($cpn_id)
{

  $sqlEdt = "DELETE FROM accept_req WHERE ac_id = '$cpn_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}


public function del_tch_p($tch_id)
{

  $sqlEdt = "DELETE FROM teacher WHERE tch_id = '$tch_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}


public function del_class_p($cls_id)
{

  $sqlEdt = "DELETE FROM class WHERE cls_id = '$cls_id';";


  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}


public function del_dpm_p($dpm_id)
{

  $sqlEdt = "DELETE FROM department WHERE dpm_id = '$dpm_id';";
  $exc_teacher = $this->db->query($sqlEdt);
 
  if ($exc_teacher ){
    
    return true;  
    
  }else{  return false; }
}
// public function CheckSession()        
// {
//   if($this->session->userdata('fname')=="") {
//     echo "<script>alert('Please Login')</script>";
//     redirect('login','refresh');
//  return FALSE;
 
//   }else{    return TRUE;    }
  
// }
 public function del_user($id)
 {
  $sql = "SELECT * FROM user WHERE user_id = '$id';";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 
  $data[0]->user_group;
  if($data[0]->user_group == "student"){
    $std_id = $data[0]->id;
    $sqlEdt = "DELETE FROM student WHERE std_id = '$std_id';";
  }else if($data[0]->user_group == "teacher"){
    $tch_id = $data[0]->id;
    $sqlEdt = "DELETE FROM teacher WHERE tch_id = '$tch_id';";
  }else if($data[0]->user_group == "company"){
    $cpn_id = $data[0]->id;
    $sqlEdt = "DELETE FROM company WHERE cpn_id = '$cpn_id';";
  }else{
    echo "ข้อมูลผิดพลาด";
    exit;
  }
  $exc = $this->db->query($sqlEdt);
  $sql = "DELETE FROM user WHERE user_id = '$id';";
  $exc = $this->db->query($sql);
 
  if ($exc){
    
    return true;  
    
  }else{  return false; }
 }

 public function selectOnedepartment($id)
 {
  $sql="SELECT * FROM department WHERE dpm_id = '$id' ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function selectOneclass($id)
 {
  $sql="SELECT class.cls_id,class.cls_name,class.cls_group,department.dpm_name,class.dpm_id,teacher.tch_name,class.tch_id,class.cls_glevel
  FROM class 
  INNER JOIN department on department.dpm_id = class.dpm_id
  INNER JOIN teacher on teacher.tch_id = class.tch_id
  WHERE cls_id = '$id'";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }
 
 public function selectOnestudent($id)
 {
  $sql="SELECT student.std_id,student.std_fname,student.std_lname,student.title,student.std_code,student.std_idcard,student.std_birthday
  ,student.std_age,student.std_sex,department.dpm_id,department.dpm_name,class.cls_id,cls_name,cls_group,cls_glevel,student.std_img
  FROM class
  INNER JOIN student on student.cls_id = class.cls_id 
  INNER JOIN department on department.dpm_id = class.dpm_id WHERE student.std_id = $id";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }
 public function selectOnecompany($id)
 {
  $sql="SELECT * FROM company WHERE cpn_id = '$id' ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }


 public function selectOneteacher($id)
 {
  $sql="SELECT * FROM teacher WHERE tch_id = '$id' ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function selectOnepass($id)
 {
  $sql="SELECT * FROM user WHERE user_id = '$id' ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function see_data_req_cpn($id)
 {
  $sql="SELECT req.req_id,company.cpn_id,company.cpn_name,company.cpn_img,company.cpn_add,company.cpn_email,company.cpn_phnumber,req.req_number
  
  FROM req
  INNER JOIN company on company.cpn_id = req.cpn_id WHERE company.cpn_id = $id ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }
 
 public function select_main_btr_cpn_data($cpn_id)
 {
  $sql="SELECT * FROM company WHERE cpn_id = '$cpn_id'";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function select_main_data($id)
 {
  $sql="SELECT req.req_id,company.cpn_id,company.cpn_name,company.cpn_img,company.cpn_add,company.cpn_email,company.cpn_phnumber,req.req_number
  
  FROM req
  LEFT JOIN company on company.cpn_id = req.cpn_id WHERE req.req_id = $id ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function select_main_data_cpn($req_id)
 {
  $sql="SELECT req.req_id,company.cpn_id,company.cpn_name,company.cpn_img,company.cpn_add,company.cpn_email,company.cpn_phnumber,req.req_number
  FROM req
  INNER JOIN company on company.cpn_id = req.cpn_id WHERE req.req_id = $req_id";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function select_main_data_std_cnp($std_id)
 {
  $sql="SELECT student.std_id,student.title,student.std_fname,student.std_lname,student.std_age,student.std_sex,student.std_status
  ,department.dpm_name,student.std_img,c.cls_name,student.std_birthday,student.std_idcard,student.std_code
  FROM student
  INNER JOIN class AS c on student.cls_id = c.cls_id
  INNER JOIN department on department.dpm_id = c.dpm_id
  INNER JOIN teacher on teacher.tch_id = c.tch_id
  
  WHERE student.std_id = $std_id  ";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 

  return $data;
 }

 public function save_new_pass($pass1,$id) {  
  $sql ="update user set user_pass = '$pass1', user_status = 1 where user_id = '$id'";
  $query = $this->db->query($sql);
  if($query) {
    return true;  
    }
  else{       
    return false;
    }
}

public function chk_insert_req($req_id ,$real_id )
        {
            $sql ="SELECT * FROM accept_req WHERE req_id = '$req_id' AND std_id ='$real_id' ";          
                $query = $this->db->query($sql);
                $data  = $query->result(); 
                if($query)
                {
                return $data;
                }
                else{
                return false;
                } 
        }

        public function chk_cpn_insert_std($std_id)
        {
            $sql ="SELECT * FROM accept_req WHERE std_id = '$std_id'";          
                $query = $this->db->query($sql);
                $data  = $query->result(); 
                if($query)
                {
                return $data;
                }
                else{
                return false;
                } 
        }


public function insert_req($req_id ,$real_id )
        {
            $sql ="INSERT INTO accept_req (
                        std_id,
                        req_id,
                        ac_status

                        )
                VALUES ('$real_id','$req_id','0');";          
                $query = $this->db->query($sql);
                
                
                if($query)
                {
                return true;
                }
                else{
                return false;
                } 
        }

        public function accept_std($std_id)
        {
          
            $sql ="UPDATE student SET  

                                        std_status ='1'
                                         
                                        WHERE std_id = '$std_id'";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }
        public function btr_cancel_accept_std($std_id)
        {
          
            $sql ="UPDATE student SET  

                                        std_status ='0'
                                         
                                        WHERE std_id = '$std_id'";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }

        public function cpn_cancel_accept_std($std_id)
        {
          
            $sql ="UPDATE accept_req SET  

                                        ac_status ='0'
                                         
                                        WHERE std_id = '$std_id'";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }

        public function chk_btr_insert_std($std_id)
        {
            $sql ="SELECT * FROM student WHERE std_id = '$std_id'";          
                $query = $this->db->query($sql);
                $data  = $query->result(); 
                if($query)
                {
                return $data;
                }
                else{
                return false;
                } 
        }
        public function cpn_accept_std($std_id)
        {
          
            $sql ="UPDATE accept_req SET  

                                        ac_status ='1'
                                         
                                        WHERE std_id = '$std_id'";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }

        public function chk_btr_insert_cpn($cpn_id)
        {
            $sql ="SELECT * FROM company WHERE cpn_id = '$cpn_id'";          
                $query = $this->db->query($sql);
                $data  = $query->result(); 
                if($query)
                {
                return $data;
                }
                else{
                return false;
                } 
        }

        public function btr_accept_cpn($cpn_id)
        {
          
            $sql ="UPDATE company SET  

                                        cpn_status ='1'
                                         
                                        WHERE cpn_id = '$cpn_id'";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }
        public function btr_cancel_accept_cpn($cpn_id)
        {
          
            $sql ="UPDATE company SET  

                                        cpn_status ='0'
                                         
                                        WHERE cpn_id = '$cpn_id'";          
                $exc = $this->db->query($sql);
                if ($exc)
                {
                return true;  
                }
                else
                {
                return false;
                }
        }
        public function select_cpn_data($id)
 {
  $sql="SELECT company.cpn_status,company.cpn_id
  FROM company
  INNER JOIN user on user.id = company.cpn_id WHERE company.cpn_id = $id";
  $query = $this->db->query($sql); 
  $data  = $query->result(); 
  
  return $data;
 }

 public function insert_req_cpn($dpm_id,$req_number,$cpn_id,$req_sex,$req_glevel)
 {
     $sql ="INSERT INTO req (
                 dpm_id,
                 req_number,
                 cpn_id,
                 req_sex,
                 req_glevel
                 )
         VALUES ('$dpm_id','$req_number','$cpn_id','$req_sex','$req_glevel');";          
         $query = $this->db->query($sql);  
         if($query)
         {
         return $this->db->insert_id();
         }
         else{
         return false;
         } 
 }



 public function insert_department($dpm_name)
 {
     $sql ="INSERT INTO department (
                 dpm_name
                 )
         VALUES ('$dpm_name');";          
         $query = $this->db->query($sql);  
         if($query)
         {
         return $this->db->insert_id();
         }
         else{
         return false;
         } 
 }



 
public function get_data()
{
$query = $this->db->get('student');
return $query->result();
}

public function count_std()
{
          $sql ="SELECT std_id  FROM student";
          $res =$this->db->query($sql);
          return $res->num_rows();
}
public function count_cpn()
{
          $sql ="SELECT cpn_id  FROM company";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_tch()
{
          $sql ="SELECT tch_id  FROM teacher";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_dpm()
{
          $sql ="SELECT dpm_id  FROM department";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_user()
{
          $sql ="SELECT user_id  FROM user";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_cls()
{
          $sql ="SELECT cls_id  FROM class";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_req_cpn_sql($cpn_id)
{
          $sql ="SELECT cls_id FROM class where cls_id = $cpn_id";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_req()
{
          $sql ="SELECT req_id  FROM req";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_std_in_cls($data)
{
          $sql ="SELECT  cls_id FROM student where cls_id = $data  ";
          $res =$this->db->query($sql);
          return $res->num_rows();
}

public function count_req_max($id)
{
          $sql ="SELECT req_id  FROM req where req_id = $id";
          $res =$this->db->query($sql);
          return $res->num_rows();
}


}



?>
