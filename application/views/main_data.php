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
            
            <br><br>
            <div class="col-xs-12">
              
      <div class="card">
        <div class="layout-content">
          <div class="layout-content-body">
          <h2>แก้ไขข้อมูลสถานประกอบการ</h2>
            <div class="row card">
                <br>
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                              
                    </div> 
                </div>
                    <?php foreach($result as $res){ ?>   
                      <div class="form-group">
                                <h3 class="col-sm-9 control-label" for="form-control-1">ชื่อบริษัท</h3>
                                <div class="col-sm-9">
                                    <h4 ><?php echo $res->cpn_name ?></h4  >
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-9 control-label" for="form-control-1">ที่อยู่</label>
                                <div class="col-sm-9">
                                    <label><?php echo $res->cpn_address ?></label>
                                </div>
                        </div>
                      
                            <?php echo $res->cpn_name ?>
                            <?php echo $res->cpn_address ?>
                            <?php echo $res->cpn_email ?>
                            <?php echo $res->cpn_phnumber ?>
                            
                            <?php  } ?> 
                          
                        &nbsp;&nbsp;<a class="btn btn-danger" href="<?php echo base_url(); ?>admin/show_company_index">ยกเลิก</a>
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