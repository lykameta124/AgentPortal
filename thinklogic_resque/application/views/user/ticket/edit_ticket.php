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
				
				<?php echo form_open('user/update_ticket', array('class' => 'form-horizontal' ));?>
              
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">Ticket send</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" value="<?php echo $singleTicket->ticket_send; ?>" readonly>
						</div>
					</div>
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">Requestor</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" value="<?php echo $singleTicket->requestor; ?>" name="requestor">
						</div>
					</div>
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">Employee under</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->employee; ?>" name="employee">
						</div>
					</div>
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">Department</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->department; ?>" name="department">
						</div>
					</div>    
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">Subject</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->subject;?>" name="subject">
						</div>
					</div>
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">description</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="description"><?php echo $singleTicket->description;?></textarea>
						</div>
					</div>
					<div class="form-group form-group-sm">
						<label class="col-sm-3 control-label">Priority</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $singleTicket->priority; ?>" name="priority">
						</div>
					</div> 
					<input type="hidden" name="ticket_id" value="<?php echo $singleTicket->ticket_id; ?>">
					<input type="submit" class="btn btn-primary" value="Submit" />
			  	 <?php echo form_close();?>
			  
			</center>
		</div>
	</div>	
</div>	
