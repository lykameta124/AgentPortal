<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Employees Masterlist
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-fw fa-user"></i> Employees 
                </li>
            </ol>
        </div>

        <!--Add new user modal -->
        <div class="col-lg-12" style="padding-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUser">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> New Employee</button>
        </div>
        <br>

        <div class="col-lg-12">
            <div class="" style="padding-bottom:5em;">
                <table id='datatables' class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr >
                            <th>ID</th>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Department</th>
                            <th>Access Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($employees as $employee){?>
                        <tr>
                            <td><?php echo $employee->emp_id; ?></td>
                            <td><?php echo $employee->first_name . ' ' . $employee->middle_name . ' ' . $employee->last_name;?></td>
                            <td><?php echo $employee->team_name; ?></td>
                            <td><?php echo $employee->department_name; ?></td>
                            <td><?php echo $employee->access_type; ?></td>
                            <td>
                            <a href="<?php echo base_url();?>admin/edit_employee/<?php echo $employee->emp_id; ?>">
                             <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span></a>           
                             <a href="#" class='reset_password' id='<?php echo $employee->emp_id; ?>' ><span class="label label-warning"> <span class="glyphicon glyphicon-refresh"></span> Reset</span></a> 
                             <?php if($employee->status == 'Active') { ?>
                              <a href="#" class="deactivate_account" id="<?php echo $employee->emp_id ?>"><span class="label label-danger"><span class="glyphicon glyphicon-remove"></span> Deactivate</span></a>
                            <?php } else { ?>
                              <a href="#" class="activate_account" id="<?php echo $employee->emp_id ?>"><span class="label label-success"><span style="width:23px;" class="glyphicon glyphicon-ok"></span> Activate</span></a>
                            <?php } ?> 
                             <!-- <a href="<?php echo base_url();?>admin/profile/<?php echo $employee->emp_id; ?>"><span class="label label-info">Profile</span></a>  -->
                            </td> 
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Register
              <?php echo '<label class="text-danger h6" style="color: red;">'. $this->session->flashdata('invalid_email') .'</label>';?>
            </h4>
          </div>
          <div class="modal-body">
            <form method="POST" class="form-horizontal" action="sign_up">
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Username" name='username' required>
                </div>
              </div>
             
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Firstname</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Firstname" name='first_name' required>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Middle name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Middle name" name='middle_name'>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label for="inputLastname" class="col-sm-3 control-label">Lastname</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Lastname" name='last_name' required>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-8">
                    <select name='gender' class="form-control" required>
                      <option selected disabled value='' hidden>Choose here</option>
                      <option value='Male'>Male</option>
                      <option value='Female'>Female</option>
                    </select>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Civil Status</label>
                <div class="col-sm-8">
                    <select name='civil_status' class="form-control" required>
                      <option selected disabled value='' hidden>Choose here</option>
                      <option value='Single'>Single</option>
                      <option value='Married'>Married</option>
                      <option value='Separated'>Separated</option>
                      <option value='Divorced'>Divorced</option>
                      <option value='Widowed'>Widowed</option>
                    </select>
                </div>
              </div>
              <div class="form-group row form-group-sm">
                  <label class="col-sm-3 control-label">Birthday</label>
                  <div class="col-sm-8">
                    <input name='birthdate' class="form-control" type="date" required>
                  </div>
              </div> 
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Age</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" placeholder="Age" name='age' required>
                </div>
              </div> 
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Address" name='address'>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Team</label>
                <div class="col-sm-8">
                    <select class="form-control" name='team_id' required>
                      <option selected disabled value='' hidden>Choose here</option>
                      <?php foreach ($teamData as $query):?>
                        <option value="<?php echo $query->team_id ;?>"><?php echo $query->team_name ;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Department</label>
                <div class="col-sm-8">
                    <select class="form-control" name='department_id' required>
                      <option selected disabled value ='' hidden>Choose here</option>
                      <?php foreach ($departmentData as $depQ):?>
                        <option value="<?php echo $depQ->department_id ;?>"><?php echo $depQ->department_name ;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Access Type</label>
                <div class="col-sm-8">
                    <select class="form-control" name='access_id' required>
                      <option selected disabled value='' hidden>Choose here</option>
                      <?php foreach ($accessData as $accT):?>
                        <option value="<?php echo $accT->access_id ;?>"><?php echo $accT->access_type ;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>           
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Register">
          </div>
          </form>
        </div>
      </div>
    </div>


