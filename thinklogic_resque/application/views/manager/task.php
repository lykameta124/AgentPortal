<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Task
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-ticket"></i> Task
                </li>
            </ol>
        </div>
        <br>
        <div class="col-lg-12">
           <?php if($ticket == TRUE){ ?> 
            <div class="table-responsive">
					<table class="table table-hover display" id='datatables' cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="8%">Ticket ID</th>
								<th width="20%">Requestor</th>
								<th width="15%">Subject</th>
								<th>Description</th>
								<th>Priority</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ticket as $name ):?>
							
								<tr <?php if($name->ticket_status == "Open"){ echo 'style="font-weight:bold"'; }?> >
									<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>"><?php echo mb_strimwidth($name->ticket_id,0,10,"...");?></a></td>
									<?php if($this->session->userdata('access_type') == 'User'){?>
										<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>""><?php echo mb_strimwidth($name->employee,0,25,"...");?></a></td>
									<?php }else{?>
										<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>"><?php echo mb_strimwidth($name->requestor,0,25,"...");?></a></td>
									<?php }?>
									<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>"><?php echo mb_strimwidth($name->subject,0,15,"...");?></a></td>
									<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>"><?php echo mb_strimwidth($name->description,0,60,"...");?></a></td>
									<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>"><?php echo $name->priority;?></a></td>
									<td><a href="<?php base_url()?>singleTastTicket/<?php echo $name->ticket_id;?>"><?php echo $name->ticket_status;?></a></td>
									
								</tr>
								
							 <?php endforeach; ?>
						</tbody>
					</table>
            </div>
			<?php } else{ echo "<h1>No Task!</h1>"; }?>
        </div>
    </div>
    <!-- /.row -->
</div>
		
