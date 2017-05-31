<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tickets
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-ticket"></i> Tickets
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewTicket">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Ticket
			</button>
        </div>
       
        <div class="col-lg-12 distance" style="padding-top:20px; padding-bottom: 20px;">
        	<ul id="navbar_menu" class="nav nav-tabs" role="tablist">
			    <li class="active"><a data-toggle="tab" href="#all">All</a></li>
			    <li><a data-toggle="tab" href="#ticketOpen">Open</a></li>
			    <li><a data-toggle="tab" href="#ticketPending">Pending</a></li>
			    <li><a data-toggle="tab" href="#ticketOngoing">Ongoing</a></li>
			    <li><a data-toggle="tab" href="#ticketDeclined">Disapproved</a></li>
			</ul>
        </div>

		<div class="tab-content" >
		    <div class="tab-pane active" id="all">
			    <div class="col-lg-12">
			    <?php if($ticket == TRUE){ ?> 
		            <div class="" style="padding-bottom:5em;">
               			 <table id='datatables' class="display" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                            <th width="8%">Ticket ID</th>
		                            <th width="20%">Requestor</th>
		                            <th width="15%">Subject</th>
		                            <th>Description</th>
		                            <th>Priority</th>
		                            <th>Status</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
								<?php foreach ($ticket as $name ):?>
								
									<tr <?php if($name->ticket_status == "Open"){ echo 'style="font-weight:bold"'; }?> >

										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo $name->ticket_status;?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo $name->ticket_status;?>
											</a>
											<?php }?>
										</td>
										<td>
											<a href="<?php echo base_url();?>manager/edit_ticket/<?php echo $name->ticket_id; ?>">
		                     			        <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
		                             		</a>  
										</td>
									</tr>
									
								 <?php endforeach; ?>
		                    </tbody>
		                </table>
		            </div>
		           <?php } else{ echo "<h1>No Ticket!</h1>"; }?>
		        </div>
		    </div>
		    <div class="tab-pane" id="ticketOpen">
		    	<div class="col-lg-12">
		           <?php if($TicketOpen == TRUE){ ?> 
		            <div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="8%">Ticket ID</th>
			                            <th width="20%">Requestor</th>
			                            <th width="15%">Subject</th>
			                            <th>Description</th>
			                            <th>Priority</th>
			                            <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($TicketOpen as $name ):?>
									
									<tr <?php if($name->ticket_status == "Open"){ echo 'style="font-weight:bold"'; }?> >

										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }?>
										</td>
										<td>
											<a href="<?php echo base_url();?>manager/edit_ticket/<?php echo $name->ticket_id; ?>">
		                     			        <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
		                             		</a>  
										</td>
									</tr>
										
									 <?php endforeach; ?>
								</tbody>
							</table>
		            </div>
					<?php } else{ echo "<h1>No Ticket!</h1>"; }?>
		        </div>
		    </div>
		    <div class="tab-pane" id="ticketPending">
		    	<div class="col-lg-12">
		           <?php if($TicketPending == TRUE){ ?> 
		            <div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="8%">Ticket ID</th>
			                            <th width="20%">Requestor</th>
			                            <th width="15%">Subject</th>
			                            <th>Description</th>
			                            <th>Priority</th>
			                            <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($TicketPending as $name ):?>
									
									<tr <?php if($name->ticket_status == "Open"){ echo 'style="font-weight:bold"'; }?> >

										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }?>
										</td>
										<td>
											<a href="<?php echo base_url();?>manager/edit_ticket/<?php echo $name->ticket_id; ?>">
		                     			        <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
		                             		</a>  
										</td>
									</tr>
										
									 <?php endforeach; ?>
								</tbody>
							</table>
		            </div>
					<?php } else{ echo "<h1>No Ticket!</h1>"; }?>
		        </div>
		    </div>
		    <div class="tab-pane" id="ticketOngoing">
		    	<div class="col-lg-12">
		           <?php if($TicketAccepted == TRUE){ ?> 
		            <div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="8%">Ticket ID</th>
			                            <th width="20%">Requestor</th>
			                            <th width="15%">Subject</th>
			                            <th>Description</th>
			                            <th>Priority</th>
			                            <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($TicketAccepted as $name ):?>
									
									<tr <?php if($name->ticket_status == "Open"){ echo 'style="font-weight:bold"'; }?> >

										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }?>
										</td>
										<td>
											<a href="<?php echo base_url();?>manager/edit_ticket/<?php echo $name->ticket_id; ?>">
		                     			        <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
		                             		</a>  
										</td>
									</tr>
										
									 <?php endforeach; ?>
								</tbody>
							</table>
		            </div>
					<?php } else{ echo "<h1>No Ticket!</h1>"; }?>
		        </div>
		    </div>
		    <div class="tab-pane" id="ticketDeclined">
		    	<div class="col-lg-12">
		           <?php if($TicketDeclined == TRUE){ ?> 
		            <div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="8%">Ticket ID</th>
			                            <th width="20%">Requestor</th>
			                            <th width="15%">Subject</th>
			                            <th>Description</th>
			                            <th>Priority</th>
			                            <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($TicketDeclined as $name ):?>
									
									<tr <?php if($name->ticket_status == "Open"){ echo 'style="font-weight:bold"'; }?> >

										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->ticket_id,0,10,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->requestor,0,25,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->subject,0,15,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo mb_strimwidth($name->description,0,60,"...");?>
											</a>
											<?php }?>
										</td>
										<td>
											<?php if($name->ticket_status == "Open"){ ?>
											<a href="<?php base_url()?>update_TicketStatusToPending/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }else{?>
											<a href="<?php base_url()?>single_ticket/<?php echo $name->ticket_id;?>">
												<?php echo $name->priority;?>
											</a>
											<?php }?>
										</td>
										<td>
											<a href="<?php echo base_url();?>manager/edit_ticket/<?php echo $name->ticket_id; ?>">
		                     			        <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
		                             		</a>  
										</td>
									</tr>
										
									 <?php endforeach; ?>
								</tbody>
							</table>
		            </div>
					<?php } else{ echo "<h1>No Ticket!</h1>"; }?>
		        </div>
		    </div>
		</div>

        <br>
        
    </div>
    <!-- /.row -->
</div>
		
	
<!-- /.container-fluid -->
<div class="modal fade" id="addNewTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Add Ticket</h4>
          </div>
          <div class="modal-body">
			<form class="form-horizontal" action="<?php echo base_url();?>manager/add_Ticket" method="POST">
              <div class="form-group form-group-sm">
				<label class="col-sm-3 control-label">Ticket ID</label>
                <div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo $ticketID['ticket_id']+1 ;?>" name="ticket_id" disabled>
                </div>
              </div>
			  <div class="form-group form-group-sm">
                <label class="col-sm-3 control-label">Requestor</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="<?php echo $data->first_name." ".$data->middle_name." ".$data->last_name ?>"  name="requestor" readonly>
                </div>
              </div>
				<div class="form-group form-group-sm">
					<label class="col-sm-3 control-label">Employee</label>
					<div class="col-sm-8">
						<select class="form-control" required name="employee">
							<option selected disabled value="" hidden>Choose here</option>
							<?php foreach($depUnder as $emp): ?>
								<option value="<?php echo $emp->first_name." ".$emp->middle_name." ".$emp->last_name;?>"><?php echo $emp->first_name." ".$emp->middle_name." ".$emp->last_name;?> </option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label class="col-sm-3 control-label">Department Type</label>
					<div class="col-sm-8">
						<select class="form-control" required name="department">
							<option selected disabled value="" hidden>Choose here</option>
							<?php foreach($depName as $dep): ?>
								<option value="<?php echo $dep->department_name ;?>"><?php echo $dep->department_name;?></option>
							<?php endforeach ;?>
						</select>
					</div>
				</div>    
				<div class="form-group form-group-sm">
					<label class="col-sm-3 control-label">Subject</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" placeholder="" required name="subject">
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label class="col-sm-3 control-label">Description</label>
					<div class="col-sm-8">
						<textarea class="form-control" name="description" required placeholder=""></textarea>
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label class="col-sm-3 control-label">Priority</label>
					<div class="col-sm-8">
						<select class="form-control" name="priority" required >
							<option selected disabled value="" hidden>Choose here</option>
							<?php foreach($priority as $prio): ?>
								<option value="<?php echo $prio;?>"><?php echo $prio;?></option>
							<?php endforeach ;?>
						</select>
					</div>
				</div>  
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="hidden" name="ticket_send" value="<?php echo date('Y-m-d H:i:s');?>">
			<input type="submit" class="btn btn-primary" value="Add Ticket" />
          </div>
		  </form>
        </div>
      </div>
    </div>