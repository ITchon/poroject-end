<body style="#F8F8FF">


		
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
							<br><br><br>
							<img class="nav-user-photo" src="<?php echo base_url(); ?>themes/ace_admin/img/logochpng.png" alt="Box icon" height="180" width="180"/>
							
							<!-- <img class="nav-user-photo" src="<?php echo base_url(); ?>themes/smartadmin/img/box_icon2.png" alt="Box icon" height="150" width="150"/> -->
								<h3>
									<!-- <i class="ace-icon fa fa-leaf green"></i> -->
									<!--<span class="red">BOX</span>-->
									<span class="red" id="id-text2">ระบบสารสนเทศการฝึกงานฝึก-อาชีพ วิทยาลัยเทคนิคชลบุรี</span>
								</h3>


								<h4 class="blue" id="id-company-text"></h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border" style="background-color: #BCC6CF;">
									<div class="widget-body">
										<div class="widget-main" style="padding: 16px 36px 36px;padding-bottom: 20px; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0px 0px 4px 0px #212529">
											<h4 class="header blue lighter bigger">
												
												กรุณาเปลี่ยนรหัสผ่านใหม่
											</h4>

											<div class="space-6"></div>

							<?php echo form_open("login/save_new_pass", array('id'=>'login-form'));?>
							<?php if ($this->session->flashdata('msg_error') != ''){ echo $this->session->flashdata('msg_error'); } ?>
							<?php echo $this->session->flashdata("failed_p1"); ?>
							<?php echo $this->session->flashdata("failed"); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password1" minlength="6" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password2" minlength="6" class="form-control" placeholder="ยืนยัน Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<!-- <label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label> -->
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															
															<span class="bigger-110">ยืนยัน</span>
														</button>

														

														<input type="hidden" name="action" value="<?php echo base64_encode('login');?>"/>
													</div>

													<div class="space-4"></div>
												</fieldset>
											<?php echo form_close();?>


											
										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								
								

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
			
		</body><!-- /.main-container -->

















