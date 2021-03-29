<!DOCTYPE html>
<html lang="en">
  
  <body class="layout layout-header-fixed">
    
    <div class="layout-main">
      
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
          </div>
            <div class="col-xs-12">
              
      <div class="card">
        <div class="layout-content">
          <div class="layout-content-body">
          <h2>ข้อมูลส่วนตัว</h2>
            
                <br>
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                              
                    </div> 
                </div>
                    <?php foreach($result as $res){ ?> 
                    <table style="width:100%">
                    
                    <tr>
                      <div class="form-group">
                      
                                <div class="col-sm-9">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;
                                <img  src="<?php echo base_url()?>./uploads/pic/<?php echo $res->tch_img?>" style="width:35% ;hight:35%;">
                                </div>
                        </div>
                    </tr>
                    <tr>
                      <div class="form-group">
                      <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">ชื่อ และ นามสกุล</h4></th>
                                <div class="col-sm-9">
                                <td ><h5><?php echo $res->tch_name ?></h5></td>
                                </div>
                        </div>
                    </tr>
                      <tr>
                        <div class="form-group">
                        <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">เบอร์โทรศัพท์</h4></th>
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->tch_tel ?></h5></td>
                                </div>
                        </div>
                      </tr>
                      <tr>
                        <div class="form-group">
                        <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">E-mail</h4></th>
                                <div class="col-sm-9">
                                    <td><h5><?php echo $res->tch_email ?></h5></td>
                                </div>
                        </div>
                      </tr> 
                      <tr> 
                        <div class="form-group">
                        <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">รหัสประจำตัวประชาชน</h4></th> 
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->tch_card ?></h5></td>
                                </div>
                        </div>
                      </tr> 

                      <tr> 
                        <div class="form-group">
                        <th width=30%><h4 class="col-sm-9 control-label" for="form-control-1">ชื่อแผนก</h4></th> 
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->dpm_name ?></h5></td>
                                </div>
                        </div>
                      </tr>

                      <tr>
                      <div class="form-group">
                      <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">ชื่อกลุ่ม</h4></th>
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->cls_name." | กลุ่มที่ : ".$res->cls_group ?></h5></td>
                                </div>
                        </div>
                      </tr>
                      
                      <tr> 
                        <div class="form-group">
                        <th width=30%><h4 class="col-sm-9 control-label" for="form-control-1">ระดับชั้น</h4></th> 
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->cls_glevel ?></h5></td>
                                </div>
                        </div>
                      </tr>
                             
                            <?php  } ?> 
                    </table>
                    </div>                
            </div>      
        </div>     
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger " href="<?php echo base_url(); ?>teacher/index">กลับหน้าหลัก</a>
        
    </div>
    
    

  </body>
  
  <script src="<?php echo base_url()?>asset/js/vendor.min.js"></script>
  <script src="<?php echo base_url()?>asset/js/elephant.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/application.min.js"></script>                                 
    
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
</html>
<style>
.color {
  color: green;
}
.color2 {
  color: red;
}
img {
  border-radius: 50%;
}
</style>