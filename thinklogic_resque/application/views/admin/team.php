		<div id="page-wrapper">

            <div class="container-fluid">
				
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Teams
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Teams
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="col-lg-12">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewTeam">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> New Team</button>
				</div>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Team</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Team</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach ($teamName as $name ):?>
                                    <tr>
										<td><?php echo $name->team_id; ?></td>
										<td><?php echo $name->team_name; ?></td>
										
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
	<div class="modal fade" id="addNewTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content resizeModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="exampleModalLabel">Add Team</h3>
            </div>
            <?php echo form_open('admin/add_TeamName','class="form-horizontal"');?>
				<div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Team Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="team_name" class="form-control" placeholder="" required />
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
    </div>