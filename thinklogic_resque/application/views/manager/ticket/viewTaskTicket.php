<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
    	<div class="col-lg-12">
            <h1 class="page-header">
                Ticket ID "<?php echo $singleTicket->ticket_id ;?>".
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
				
				<div class="col-md-12">
					<div class="alert alert-info cold-md-3" role="alert">
					<?php if($note == TRUE){?>
						<p><span class="glyphicon glyphicon-info-sign"></span><strong> Note!!! </strong><i><?php echo $note->assign_note; ?></i></p>
					<?php }else{?>
						<p><span class="glyphicon glyphicon-info-sign"></span><i>No notes!</i></p>
					<?php } ?>
					</div>
				</div>
				<div class="form-horizontal">

					<div class="form-group ">
						<label class="col-sm-3 control-label">Date sent</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" value="<?php echo date('F d, Y h:i:s a', strtotime($singleTicket->ticket_send) ); ?>" readonly>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Requestor</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" value="<?php echo $singleTicket->requestor; ?>" readonly>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Employee under</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->employee; ?>"readonly>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Department</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->department; ?>"readonly>
						</div>
					</div>    
					<div class="form-group ">
						<label class="col-sm-3 control-label">Subject</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->subject;?>" readonly>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">Description</label>
						<div class="col-sm-8">
							<textarea class="form-control" readonly><?php echo $singleTicket->description;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Priority</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->priority; ?>" readonly>
						</div>
					</div>
						<?php if($singleTicket->ticket_status == 'Pending' || $singleTicket->ticket_status == 'Open'){?>
							<hr/>
							<form method="POST" class="form-horizontal" action="<?php echo base_url().'manager/' ;?>updateReqNote">
								
								<div class="form-group ">
									<label class="col-sm-3 control-label">Note</label>
									<div class="col-sm-8">
										<textarea class="form-control" name="requestor_note" placeholder="add note to requestor..."></textarea>
										<input type="hidden" value="<?php echo $singleTicket->ticket_id; ?>" name="ticket_id">
									</div>
								</div>
								<div class="form-group ">
								
									<input type="submit" class="btn btn-primary confirmation" name="stat" value="Completed">
									<input type="submit" class="btn btn-success confirmation" name="stat" value="Ongoing">
									<input type="submit" class="btn btn-danger confirmation" name="stat" value="Disapproved">
								
								</div> 
							</form>
							<hr/>
						<?php } elseif($singleTicket->ticket_status == 'Ongoing'){?>
							<hr/>
							<form method="POST" class="form-horizontal" action="<?php echo base_url().'manager/' ;?>updateReqNote">
								
								<div class="form-group ">
								<label class="col-sm-3 control-label">Note</label>
									<div class="col-sm-8">
										<textarea class="form-control" name="requestor_note" placeholder="add note to requestor..."></textarea>
										<input type="hidden" value="<?php echo $singleTicket->ticket_id; ?>" name="ticket_id">
									</div>
								</div>
								<div class="form-group ">
									<input type="submit" class="btn btn-primary confirmation" name="stat" value="Completed">
								</div> 
							</form>
							<hr/>
						<?php } elseif($singleTicket->ticket_status == 'Disapproved'){ ?>
							<h3>This ticket has been disapproved.</h3>
						<?php } elseif($singleTicket->ticket_status == 'Completed'){ ?>
							<h3>This ticket has been completed.</h3>
						<?php } ?>
				</div>
			  
			</center>
		</div>
		</div>	
	</div>	
    <!-- /.row -->
    <!--<div style="background-color: black;width:50%;height:50%;"></div>-->
</div>