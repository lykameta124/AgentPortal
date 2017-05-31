		<div id="page-wrapper">

            <div class="container-fluid">
				
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Department
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Departments
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="col-lg-12">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewDep">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Department</button>
				</div>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Department</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach ($depName as $name ):?>
                                    <tr>
										<td><?php echo $name->department_id; ?></td>
										<td><?php echo $name->department_name; ?></td>
										
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
	<div class="modal fade " id="addNewDep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content resizeModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="exampleModalLabel">Add Department</h3>
           </div>
            <?php echo form_open('admin/add_DepName','class="form-horizontal"');?>
            <div class="modal-body">
				    <div class="form-group">
                        <label class="col-sm-4 control-label">Department Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="department_name" class="form-control " placeholder="" required />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="" class="btn btn-primary" required />
            </div>
            <?php form_close();?>
        </div>
      </div>
    </div>