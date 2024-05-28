<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                            <th>TypeDocument</th>
                            <th>Document</th>
                          <th>Names</th>
                          <th>LastName</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Phone</th>
                          <th>Rol</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($users as $value):?>
                        <tr>
                          <td><?php echo $value['tipoDoc'];?></td>
                          <td><?php echo $value['Documento'];?></td>
                          <td><?php echo $value['Nombres'];?></td>
                          <td><?php echo $value['Apellidos'];?></td>
                          <td><?php echo $value['Email'];?></td>
                          <td><?php echo $value['Usuario'];?></td>
                          <td><?php echo $value['Telefono'];?></td>
                          <td><?php echo $value['rol'];?></td>
                          <td>
                            <?php if($value['Estado'] == 1):?> 
                                <label class="badge badge-pill badge-success">Available</label>
                                <?php else: ?>
                                <label class="badge badge-pill badge-danger">UnAvailable</label>
                                <?php endif;?>
                            </td>
                          <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit" title="Edit" onclick="dataUser('<?php echo $value['idUsuario'];?>')"><i class="fa fa-edit"></i></button>

                            <button type="button" class="btn btn-warning btn-xs" onclick="changeUser('<?php echo $value['idUsuario'];?>')"><i class="fa fa-refresh"></i></button>

                            <button type="button" class="btn btn-danger btn-xs" onclick="deleteUser('<?php echo $value['idUsuario'];?>')"><i class="fa fa-trash"></i></button>
                            
                          </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

                  <div class="modal fade bs-example-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post">
                            <input type="hidden" name="txtIdUser" id="txtIdUser">

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
                                <input type="text" id="txtFirstName" required="required" class="form-control" name="txtFirstName">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="txtLastName" name="txtLastName" required="required" class="form-control">
                              </div>
                            </div>

                            <div class="item form-group">
                                <label for="phone" class="col-form-label col-md-3 col-sm-3 label-align">Phone <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input id="txtPhone" class="form-control" type="number" name="txtPhone">
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
                                <input id="txtEmail" class="form-control" type="text" name="txtEmail">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="user" class="col-form-label col-md-3 col-sm-3 label-align">User<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="txtUser" class="form-control" type="text" name="txtUser">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="txtPassword" class="form-control" type="text" name="txtPassword">
                              </div>
                            </div>
                            <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                        