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
                            <li class="active">
                                <i class="fa fa-user-o"></i> Profile
                            </li>
                        </ol>
                    </div>
                </div>
                <?php foreach($data as $row){?>
                <!-- /.row -->
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

                <div class="col-lg-8">
                
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
                          <input type="password" class="form-control" placeholder="Password" name='password' readonly='true'>
                        </div>
                      </div> -->
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Firstname</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Firstname" name='first_name' value='<?php echo $row->first_name; ?>' readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Middle name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Middle name" name='middle_name' value='<?php echo $row->middle_name; ?>' readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label for="inputLastname" class="col-sm-3 control-label">Lastname</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Lastname" name='last_name' value='<?php echo $row->last_name; ?>' readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="" value="<?php echo $row->gender ?>" readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Civil Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="" value="<?php echo $row->civil_status?>" readonly='true'>
                        </div>
                      </div>
                      <div class="form-group row form-group-sm">
                          <label class="col-sm-3 control-label">Birthday</label>
                          <div class="col-sm-8">
                            <input name='birthdate' class="form-control" type="date" value="<?php echo date('Y-m-d', strtotime($row->birthdate)); ?>" readonly='true'>
                          </div>
                      </div> 
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" placeholder="Age" name='age' value="<?php echo $row->age;?>" readonly='true'>
                        </div>
                      </div> 
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="Address" name='address' value="<?php echo $row->address?>" readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Team</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name=""  value="<?php echo $row->team_name?>" readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="" value="<?php echo $row->department_name?>" readonly='true'>
                        </div>
                      </div>
                      <div class="form-group form-group-sm">
                        <label class="col-sm-3 control-label">Access Type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="" value="<?php echo $row->access_type?>" readonly='true'>
                        </div>
                      </div>
                      <div class="form-group col-md-11">
                        <input type="hidden" name="emp_id" value="<?php echo $row->emp_id; ?>">
                        <?php echo anchor('manager/edit_profile/'.$row->emp_id,'Edit Profile',array('class'=>'btn btn-primary pull-right')) ?>
                        <br><br><br><br><br><br>
                      </div>
                    <?php echo form_close();?>
                    <?php } ?>
                  </div>
                </div>
            </div>
            <!-- /.container-fluid -->