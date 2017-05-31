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
				<div class="form-horizontal">
					<div class="form-group ">
						<label class="col-sm-3 control-label">Date sent</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" value="<?php echo date('F d, Y h:i:s a', strtotime($singleTicket->ticket_send) ); ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Requestor</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" value="<?php echo $singleTicket->requestor; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Employee under</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->employee; ?>"readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Department</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->department; ?>"readonly>
						</div>
					</div>    
					<div class="form-group">
						<label class="col-sm-3 control-label">Subject</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->subject;?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">description</label>
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

					<?php if($assign == FALSE){?>
						<?php if($singleTicket->ticket_status == 'Pending' || $singleTicket->ticket_status == 'Open'){?>
						<hr/>
						<form method="POST" class="form-horizontal" action="<?php echo base_url().'manager/' ;?>add_ticketAssign">
							<div class="row">
								<div class="form-group form-group-sm">
								<label class="col-sm-3 control-label">Assign Ticket</label>
								<div class="col-sm-8">
									<select class="form-control" name="emp_id" required>
										<option selected disabled hidden value=''>Choose here</option>
										<option value="<?php echo $this->session->userdata('emp_id');?>"><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('middle_name')." ".$this->session->userdata('last_name');?> </option>

										<?php foreach($depUnder as $emp): ?>
											<?php if ($emp->emp_id != $this->session->userdata('emp_id')){?>
												<option value="<?php echo $emp->emp_id; ?>"><?php echo $emp->first_name." ".$emp->middle_name." ".$emp->last_name;?></option>
										<?php } endforeach; ?>
									</select>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-3 control-label">Note</label>
								<div class="col-sm-8">
									<textarea class="form-control" name="assign_note" placeholder="Ticket Note"></textarea>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<center>
									<input type="hidden" name="ticket_id" value="<?php echo $singleTicket->ticket_id ;?>">
									<input type="submit" class="btn btn-primary confirmation" value="Assign">
								</center>
							</div> 
							
							</div>
						</form>
						<hr/>
						<?php } ?>	
					<?php }else{ echo "Already Assigned";}?>
				</div>
			  
			</center>
		</div>
		</div>	
	</div>	
    <!-- /.row -->
    <!--<div style="background-color: black;width:50%;height:50%;"></div>-->
</div>