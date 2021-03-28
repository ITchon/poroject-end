<!DOCTYPE html>
<html lang="en">
  
  <body class="layout layout-header-fixed">
    
    <div class="layout-main">
      
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
          </div>
          
            
            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->flashdata("success"); ?> 
            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->flashdata("failed"); ?>   
            <div class="col-xs-12">
              
              <div class="card">
                
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                    
                  </div>
                  <strong>คำร้องนักศึกษาฝึกงาน</strong>
                </div>
                <div class="card-body">
        <div class="panel-body collapse in">      
        
              <div class="table-responsive">
                <div class="card-body">
                  <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable text-center" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        
                        <th class="text-center">คำนำหน้า</th>
                        <th class="text-center">ชื่อ</th>
                        <th class="text-center">นามสกุล</th>
                        <th class="text-center">อายุ</th>
                        <th class="text-center">เพศ</th>
                        <th class="text-center">แผนกวิชา</th>
                        <th class="text-center">สถาณะ</th>
                        <th class="text-center">รายระเอียดเพิ่มเติม</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($result as $res){ ?>
                          <tr>
                            <td><?php echo $res->title ?></td>
                            <td><?php echo $res->std_fname ?></td>
                            <td><?php echo $res->std_lname ?></td>
                            <td><?php echo $res->std_age ?></td>
                            <td><?php echo $res->std_sex ?></td>
                            <td><?php echo $res->dpm_name?></td>
                            <td>
                            <?php if( $res->ac_status == 1){
                               echo '<span class="color">รับเข้าฝึกงานแล้ว</span>';
                             }else{
                               echo '<span class="color2">ยังไม่รับเข้าฝึกงาน</span>';
                             }?>
                            </td>
                            <td>
                            <a type ='button'   onclick="javascript:window.location='<?php echo base_url() . 'company/index2/' . $res->std_id;  ?>';"><i class='btn btn-success '>ดูข้อมูลเพิ่มเติม</i></a> 
                             
                            &nbsp;<a class="btn btn-danger " data-toggle="modal" data-target="#warningModalAlert" >ลบ</a>    
                            </td>
                            </tr>
                            <?php  } ?> 
                           
                    </tbody>                
                  </table>
                </div>  
              </div>                              
        </div>
        </div>
      </div>
            
            
          </div>
      </div>
      
    </div>



    <div id="warningModalAlert" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog polaroid ">
        <div class="modal-content">
          <div class="modal-body ">
            <div class="text-center">
              <span class="text-warning icon icon-exclamation-triangle icon-5x"></span>
              <h3 class="text-warning">คำเตือน</h3>
              <h1>กรุณากด "ยืนยัน" เพื่อลบ</h1>
              <div class="m-t-lg">
              <?php echo "<a type='button' href='".base_url()."company/delete_ac_f/".$res->ac_id."' ' ><label class='btn btn-danger'>ยืนยัน</label></a>";?>
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
    <script src="<?php echo base_url()?>asset/js/demo.min.js"></script>
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
</style>