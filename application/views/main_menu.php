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
            <br><br>
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
                        <th class="text-center">ที่อยู่สถานประกอบการ</th>
                        <th class="text-center">ต้องการเพศ</th>
                        <th class="text-center">ต้องการระดับชั้น</th>
                        <th class="text-center">ต้องการแผนก</th>
                        <th class="text-center">รายละเอียดเพิ่มเติม</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($result as $res){ ?>
                          <tr>
                            
                            <td><?php echo $res->cpn_name ?></td>
                            <td><?php echo $res->cpn_add ?></td>
                            <td><?php echo $res->req_sex ?></td>
                            <td><?php echo $res->req_glevel ?></td>
                            <td><?php echo $res->dpm_name ?></td>
                            <td>
                            <a type ='button'   onclick="javascript:window.location='<?php echo base_url() . 'main/index2/' . $res->req_id;  ?>';"><i class='btn btn-success '>ดูข้อมูลเพิ่มเติม</i></a> 
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