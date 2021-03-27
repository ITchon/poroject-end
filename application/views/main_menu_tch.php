<!DOCTYPE html>
<html lang="en">
  
  <body class="layout layout-header-fixed">
    
    <div class="layout-main">
      
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
          </div>
          <div class="row gutter-xs">
          <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#00FF00", "#757575"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">879</span>
                        <small>Resolved</small>
                      </h2>
                      <small>More than 70% resolved issues</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#66FFFF", "#757575"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">879</span>
                        <small>Resolved</small>
                      </h2>
                      <small>More than 70% resolved issues</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#757575", "#0288d1"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">377</span>
                        <small>Unresolved</small>
                      </h2>
                      <small>Less than 30% unresolved issues</small>
                    </div>
                  </div>
                </div>
              </div>
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
                  <strong>รายชื่อนักศึกษา</strong>
                </div>
                <div class="card-body">
        <div class="panel-body collapse in">      
        
              <div class="table-responsive">
                <div class="card-body">
                  <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable text-center" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        
                        <th class="text-center">คำนำหน้า</th>
                        <th class="text-center">ชื่อจริง</th>
                        <th class="text-center">นามสกุล</th>
                        <th class="text-center">อายุ</th>
                        <th class="text-center">เพศ</th>
                        <th class="text-center">แผนกวิชา</th>
                        <th class="text-center">บริษัทที่รับเข้าฝึกงาน</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">รายละเอียดเพิ่มเติม</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                     foreach($result as $res){ ?>
                          <tr>
                            
                            <td><?php echo $res->title ?></td>
                            <td><?php echo $res->std_fname ?></td>
                            <td><?php echo $res->std_lname ?></td>
                            <td><?php echo $res->std_age ?></td>
                            <td><?php echo $res->std_sex ?></td>
                            <td><?php echo $res->dpm_name?></td>
                            <td><?php echo $res->cpn_name?></td>
                            <td>
                            <?php if(isset($res->ac_status)){
                            if( $res->ac_status == 1){
                               echo '<span class="color">มีสถานที่ฝึกงานแล้ว</span>';
                             }else{
                               echo '<span class="color3">รออนุมัติ</span>';
                             }
                            }else{
                              echo '<span class="color2">ยังไม่มีที่ฝึกงาน</span>';
                             }?>
                            </td>
                            <td>
                            <a type ='button'   onclick="javascript:window.location='<?php echo base_url() . 'teacher/index2/' . $res->std_id;  ?>';"><i class='btn btn-success '>ดูข้อมูลเพิ่มเติม</i></a> 
                            <?php echo "<a type='button' href='".base_url()."company/delete_ac_f/".$res->ac_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn btn-danger'>ลบ</i></a>";?> 
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
.color3 {
  color: orange;
}
</style>