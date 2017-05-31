<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Employee Profile
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="">
                                <i class="fa fa-file"></i> Employee
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Edit Profile
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php foreach($data as $row){?>
                <center>
                <div class="col-lg-4">
                  <div class="col-sm-12">
                    <img class="img-circle" src="<?php echo base_url() . $row->image; ?>" alt="" height="300" width="300">
                  </div>
                  <div class="col-sm-12" >
                    <br>
                    <label><?php echo $row->first_name . " " . $row->last_name;?></label><br>
                    <i><?php echo $row->department_name . " Department"; ?></i>
                  </div>
                  <div class="col-sm-12">
                  <br><br>
                    <?php echo form_open_multipart('manager/upload_picture/' . $row->emp_id); ?>
                      <input type="file" name="img" size="20" style="padding-bottom: 10px;">
                      <input type="submit" name="submit" value="Upload" class="">
                    <?php echo form_close();?> 
                  </div>   
                </div>
                </center>
                <?php } ?>

                <div class="col-lg-8">
                <?php foreach($data as $row){?>
                    <?php echo form_open('manager/update_profile', array('class' => 'form-horizontal' ));?>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name='username' placeholder='Username' value='<?php echo $row->username ?>' readonly='true'>
                        </div>
                      </div>
                      <!-- <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" placeholder="Password" name='password' >
                        </div>
                      </div> -->
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Firstname</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Firstname" name='first_name' value='<?php echo $row->first_name; ?>'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Middle name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Middle name" name='middle_name' value='<?php echo $row->middle_name; ?>'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label for="inputLastname" class="col-sm-3 control-label">Lastname</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Lastname" name='last_name' value='<?php echo $row->last_name; ?>'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-8">
                            <select name='gender' class="form-control">
                              <option selected disabled hidden>Choose here</option>
                              <option value='Male' <?php if($row->gender == 'Male'){ echo 'selected'; } ?> >Male</option>
                              <option value='Female' <?php if($row->gender == 'Female'){ echo 'selected'; } ?> >Female</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Civil Status</label>
                        <div class="col-sm-8">
                            <select name='civil_status' class="form-control">
                              <option selected disabled hidden>Choose here</option>
                              <option value='Single' <?php if($row->civil_status == 'Single'){ echo 'selected'; } ?>>Single</option>
                              <option value='Married' <?php if($row->civil_status == 'Married'){ echo 'selected'; } ?>>Married</option>
                              <option value='Separated' <?php if($row->civil_status == 'Separated'){ echo 'selected'; } ?>>Separated</option>
                              <option value='Divorced' <?php if($row->civil_status == 'Divorced'){ echo 'selected'; } ?>>Divorced</option>
                              <option value='Widowed' <?php if($row->civil_status == 'Widowed'){ echo 'selected'; } ?>>Widowed</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row form-group-sm">
                          <label class="col-sm-3 control-label">Birthday</label>
                          <div class="col-sm-8">
                            <input name='birthdate' class="form-control" type="date" value="<?php echo date('Y-m-d', strtotime($row->birthdate)); ?>">
                          </div>
                      </div> 
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" placeholder="Age" name='age' value="<?php echo $row->age;?>">
                        </div>
                      </div> 
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Address" name='address' value="<?php echo $row->address?>">
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Team</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='team_id' required>
                              <option selected disabled hidden>Choose here</option>
                              <?php foreach ($teamData as $query):?>
                                <option value="<?php echo $query->team_id ;?>"
                                <?php if($query->team_name == $row->team_name){ echo ("selected"); }?> >
                                  <?php echo $query->team_name ;?>
                                </option>
                              <?php endforeach;?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='department_id' required>
                              <option selected disabled hidden>Choose here</option>
                              <?php foreach ($departmentData as $depQ):?>
                                <option value="<?php echo $depQ->department_id ;?>"
                                  <?php if($depQ->department_name == $row->department_name){ echo ("selected"); }?> >
                                  <?php echo $depQ->department_name ;?>
                                </option>
                              <?php endforeach;?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Access Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='access_id' required>
                              <option selected disabled hidden>Choose here</option>
                              <?php foreach ($accessData as $accT):?>
                                <option value="<?php echo $accT->access_id ; ?>" 
                                  <?php if($accT->access_type == $row->access_type){ echo ("selected"); }?> >
                                  <?php echo $accT->access_type ;?>
                                </option>
                              <?php endforeach;?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group col-md-11">
                        <input type="hidden" name="emp_id" value="<?php echo $row->emp_id; ?>">
                        <input type="submit" name="update" value="Update" class="btn btn-info pull-right" style="margin-left: 10px"/>
                        <?php echo anchor('manager/profile','Cancel',array('class'=>'btn btn-default pull-right')) ?>&nbsp;&nbsp;&nbsp;
                        <br><br><br><br><br><br>
                      </div>
                    <?php echo form_close();?>
                    <?php } ?>
                  </div>
                </div>
            </div>
            <!-- /.container-fluid -->