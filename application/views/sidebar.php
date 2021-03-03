<div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                <li class="sidenav-search hidden-md hidden-lg">
                  <form class="sidenav-form" action="/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item has-subnav active">
                  <a href="dashboard-1.html" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-home"></span>
                    <span class="sidenav-label">เมนูหลัก
                    </span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li class="sidenav-subheading">เมนูหลัก
                    </li>
                    <li><a href="<?php echo base_url();?>admin/show_user_index">แสดงข้อมูลสมาชิก</a></li>
                    <li><a href="<?php echo base_url();?>admin/show_student_index">แสดงข้อมูลนักเรียน</a></li>
                    <li><a href="<?php echo base_url();?>admin/show_company_index">แสดงข้อมูลบริษัท</a></li>
                    <li><a href="<?php echo base_url();?>admin/show_teacher_index">แสดงข้อมูลอาจารย์</a></li>
                    <li><a href="<?php echo base_url();?>admin/show_class_index">แสดงข้อมูลห้องเรียน</a></li>
                  </ul>
                </li>
                 
              </ul>
            </nav>
          </div>
        </div>
      </div>
