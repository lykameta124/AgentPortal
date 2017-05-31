<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <strong><?php echo $this->session->userdata('department_name'); ?></strong> Employees
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-fw fa-user"></i> <?php echo $this->session->userdata('department_name'); ?> Employees 
                </li>
            </ol>
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
                  <input type="text" class="form-control" placeholder="Username" name='username'>
                </div>
              </div>
             
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Firstname</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Firstname" name='first_name'>
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
                  <input type="text" class="form-control" placeholder="Lastname" name='last_name'>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-8">
                    <select name='gender' class="form-control">
                      <option selected disabled hidden>Choose here</option>
                      <option value='Male'>Male</option>
                      <option value='Female'>Female</option>
                    </select>
                </div>
              </div>
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Civil Status</label>
                <div class="col-sm-8">
                    <select name='civil_status' class="form-control">
                      <option selected disabled hidden>Choose here</option>
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
                    <input name='birthdate' class="form-control" type="date" >
                  </div>
              </div> 
              <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Age</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" placeholder="Age" name='age'>
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
                      <option selected disabled hidden>Choose here</option>
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
                      <option selected disabled hidden>Choose here</option>
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
                      <option selected disabled hidden>Choose here</option>
                      <?php foreach ($accessData as $accT):?>
                        <option value="<?php echo $accT->access_id ;?>"><?php echo $accT->access_type ;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>           
              s
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Register">
          </div>
          </form>
        </div>
      </div>
    </div>


