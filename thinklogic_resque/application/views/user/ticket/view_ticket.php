<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
    	<div class="col-lg-12">
            <h1 class="page-header">
                Ticket Details
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-ticket"></i> Tickets
                </li>
                <li class="active">
                    <i class="fa fa-ticket"></i> View Ticket
                </li>
            </ol>
        </div>
		<div class="">
<br />
			<center>				
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label" >Status</label>
						<div class="col-sm-6" >
							<?php 
								$stat = $singleTicket->ticket_status;
								$class = '';
								if($stat == 'Pending'){
									$class = "class='label label-warning'";
								} else if($stat == 'Ongoing' || $stat == 'Approve'){
									$class = "class='label label-info'";
								} else if($stat == 'Disapproved'){
									$class = "class='label label-danger'";
								} else if($stat == 'Completed'){
									$class = "class='label label-success'";
								} else {
									$class = "class='label label-default'";			
								}
							?>
						  <h4><span <?php echo $class; ?> ><?php echo $stat; ?></span></h4>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Note</label>
						<div class="col-sm-6">
						<?php if($note == TRUE){?>
							<textarea class="form-control" readonly><?php echo $note->requestor_note;?></textarea>
						<?php }else{?>
							<textarea class="form-control" readonly>No Notes</textarea>
						<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Ticket ID</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" value="<?php echo $singleTicket->ticket_id; ?>"readonly>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Request Date</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" value="<?php echo date('F d, Y h:i:s a', strtotime($singleTicket->ticket_send)); ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Requestor</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" value="<?php echo $singleTicket->requestor; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Employee under</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?php echo $singleTicket->employee; ?>"readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Department</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?php echo $singleTicket->department; ?>"readonly>
						</div>
					</div>    
					<div class="form-group">
						<label class="col-sm-3 control-label">Subject</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?php echo $singleTicket->subject;?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Description</label>
						<div class="col-sm-6">
							<textarea class="form-control" readonly><?php echo $singleTicket->description;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Priority</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?php echo $singleTicket->priority; ?>" readonly>
						</div>
					</div> 
				</div>
			  
			</center>
		</div>
		</div>	
	</div>	
    <!-- /.row -->
    <!--<div style="background-color: black;width:50%;height:50%;"></div>-->
</div>