<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Design <small>different form elements</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method = "POST">
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 label-align ">Document Type</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name ="selDocType" id="selDocType">
													<option>Choose option</option>
													<?php foreach($documentType as $value):?>
														<option value="<?php echo $value['idTipoDocumento'];?>"><?php echo $value['doc'];?></option>
														<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Document<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtDocument" required="required" class="form-control" name="txtDocument">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="firstname" required="required" class="form-control" name="txtNames">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="lastname" name="txtLastname" required="required" class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label for="phone" class="col-form-label col-md-3 col-sm-3 label-align">Phone <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="phone" class="form-control" type="number" name="txtPhone">
											</div>
										</div>
										<div class="item form-group">
											<label for="adress" class="col-form-label col-md-3 col-sm-3 label-align">Adress <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="txtAdress" class="form-control" type="text" name="txtAdress">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="text" name="txtEmail">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<div id="selGender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="selGender" value="male" class="join-btn"> &nbsp; Male &nbsp;
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="selGender" value="female" class="join-btn"> Female
													</label>
												</div>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" name="txtBirthdate" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="item form-group">
											<label for="user" class="col-form-label col-md-3 col-sm-3 label-align">User<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="user" class="form-control" type="text" name="txtUser">
											</div>
										</div>
										<div class="item form-group">
											<label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="password" class="form-control" type="text" name="txtPassword">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 label-align ">Rol</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name = "selRol" id="selRol">
													<option>Choose option</option>
													<?php foreach($roles as $value):?>
														<option value="<?php echo $value['idRol'];?>"><?php echo $value['Descripcion'];?></option>
														<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success" name ="btnRegister">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>