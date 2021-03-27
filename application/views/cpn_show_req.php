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
                  <strong>รายการสถานประกอบการ</strong>
                </div>
                <div class="card-body">
        <div class="panel-body collapse in">      
        
              <div class="table-responsive">
                <div class="card-body">
                  <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable text-center" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        
                        <th class="text-center">ชื่อสถานประกอบการ</th>
                        <th class="text-center">ระดับชั้น</th>
                        <th class="text-center">ต้องการแผนกวิชา</th>
                        <th class="text-center">เพศ</th>
                        <th class="text-center">ต้องการนักศึกษา</th>
                        <th class="text-center">รายละเอียดเพิ่มเติม</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($result as $res){ ?>
                          <tr>
                            
                            <td><?php echo $res->cpn_name ?></td>
                            <td><?php echo $res->req_glevel ?></td>
                            <td><?php echo $res->dpm_name ?></td>
                            <td><?php echo $res->req_sex ?></td>
                            <td><?php echo $res->req_number?></td>
                            <td>
                            <a type ='button'   onclick="javascript:window.location='<?php echo base_url() . 'company/index_show_cpn_req_data/' . $res->cpn_id;  ?>';"><i class='btn btn-success '>ดูข้อมูลเพิ่มเติม</i></a> 
                            <?php echo "<a type='button' href='".base_url()."company/delete_cpn_req_data/".$res->req_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn btn-danger'>ลบ</i></a>";?>
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