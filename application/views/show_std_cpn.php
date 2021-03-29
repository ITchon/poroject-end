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
        <h2>สถานประกอบการที่นักเรียนสมัคร</h2>
          <div class="layout-content-body">
          
            
                <br>
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                              
                    </div> 
                </div>
                    <?php 
                    if($result == null){
                      echo '<span class="color2"><h1>ไม่มีข้อมูลสถานที่ฝึกงานของคุณ</h1></span>';
                    }else{?>
                    <?php foreach($result as $res){ ?> 
                    <table style="width:100%">
                    
                    <!-- <tr>
                      <div class="form-group">
                      <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">รูปบริษัท</h4></th>
                                <div class="col-sm-9">
                                <td><img src="<?php echo base_url()?>../img/<?php echo $res->cpn_img ?>"style="width:12%"></td>
                                </div>
                        </div>
                    </tr> -->
                    <tr>
                      <div class="form-group">
                      
                                <div class="col-sm-9">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;
                                <img  src="<?php echo base_url()?>./uploads/pic/<?php echo $res->cpn_img?>" style="width:35% ;hight:35%;">
                                </div>
                        </div>
                    </tr>
                    <tr>
                      <div class="form-group">
                      <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">ชื่อบริษัทบริษัท</h4></th>
                                <div class="col-sm-9">
                                <td ><h5><?php echo $res->cpn_name ?></h5></td>
                                </div>
                        </div>
                    </tr>
                      <tr>
                        <div class="form-group">
                        <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">ที่อยู่</h4></th>
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->cpn_add ?></h5></td>
                                </div>
                        </div>
                      </tr>
                      <tr>
                        <div class="form-group">
                        <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">E-mail</h4></th>
                                <div class="col-sm-9">
                                    <td><h5><?php echo $res->cpn_email ?></h5></td>
                                </div>
                        </div>
                      </tr> 
                      <tr> 
                        <div class="form-group">
                        <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">เบอร์โทรศัพท์</h4></th> 
                                <div class="col-sm-9">
                                <td><h5><?php echo $res->cpn_phnumber ?></h5></td>
                                </div>
                        </div>
                      </tr> 
                      <tr>
                      <div class="form-group">
                      <th width=25%><h4 class="col-sm-9 control-label" for="form-control-1">สถานะ</h4></th>
                                <div class="col-sm-9">
                                <td><h5><?php if( $res->ac_status == 1){
                               echo '<span class="color">อนุมัติเข้าฝึกงานแล้ว</span>';
                             }else{
                               echo '<span class="color2">รออนุมัติเข้าฝึกงาน</span>';
                             }?></h5></td>
                                </div>
                        </div>
                      </tr>
                                
                            <?php  } ?> 
                    </table>
                    
                    </div>                
            </div>      
        </div>     
        <br>
        
        <?php if($res->ac_status == 0) {?>
          &nbsp;<a class="btn btn-warning " data-toggle="modal" data-target="#warningModalAlert" >ยกเลิกการสมัคร</a>
        <?php  }else{
          echo '<span class="color"><h4>คุณได้รับการอนุมัติเข้าฝึกงานที่บริษัทนี้แล้ว</h4></span>
          <p class="help-block">
          <h5>*** หมายเหตุ : ถ้าต้องการจะยกเลิกการสมัคให้ติดต่อที่ | งานทวิภาคี | ***</h5>
          </p>  ';
        } ?> 
        &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger " href="<?php echo base_url(); ?>student/index">กลับหน้าหลัก</a>
        
        
        
        <?php  } ?> 
        
    </div>
  
    <div id="warningModalAlert" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog polaroid ">
        <div class="modal-content">
          <div class="modal-body ">
            <div class="text-center">
              <span class="text-warning icon icon-exclamation-triangle icon-5x"></span>
              <h3 class="text-warning">คำเตือน</h3>
              <h1>กรุณากด "ยืนยัน" เพื่อยกเลิกการสมัค</h1>
              <div class="m-t-lg">
              <?php echo "<a type='button' href='".base_url()."student/delete_student_ac_std/".$res->ac_id."' ' ><label class='btn btn-danger'>ยืนยัน</label></a>";?>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
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
  color: Orange;
}
img {
  border-radius: 50%;
}
</style>