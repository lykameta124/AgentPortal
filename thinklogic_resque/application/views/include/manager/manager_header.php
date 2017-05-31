<!doctype html>
<html lang="en">

<head>
	<title>ThinkLogic ResQue | Manager</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/linearicons/style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#datatables').DataTable();
		} );
	</script>
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<nav class="navbar navbar-fixed-top">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>
		</nav>
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
				<div class="scrollbar" id="style-1">
				<nav>
					<ul class="nav">
						<div ><br />
							<center><img src="<?php echo base_url();?>images/logo.png" alt=""/></center>
						</div>
						<br />
						<?php $lastname = $this->session->userdata('last_name');?>
						<div style="padding-left:20px;color:#AEB7C2;">
							<table cellspacing="10">
								<tr>
									<tr>
										<td rowspan="2" style="padding-right: 15px;"><img src="<?php echo base_url() . '' . $this->session->userdata('image');?>" height="60px" width="60px" class="img-circle" style="border:5px solid #0c9ed2"></td>
										<td>Welcome Manager,</td>
									</tr>
									<tr>
										<td><b style="font-style: italic;font-size: 20px;"><?php echo strtoupper($lastname);?></b></td>
									</tr>
								</tr>
							</table>
						</div>
						<br>
						<li><a href="<?php echo base_url();?>manager/dashboard" class=""><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
						<li>
							<a href="#account" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Account</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="account" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url();?>manager/profile" class=""><i class="fa fa-circle-o" style="font-size: 10px;"></i>Profile</a></li>
									<li><a href="<?php echo base_url();?>manager/settings" class=""><i class="fa fa-circle-o" style="font-size: 10px;"></i>Settings</a></li>
								</ul>
							</div>
						</li>
						<li><a href="<?php echo base_url();?>manager/task" class=""><i class="fa fa-tasks" aria-hidden="true"></i>Tasks</a></li>
						<li><a href="<?php echo base_url();?>manager/employees" class=""><i class="fa fa-address-card" aria-hidden="true"></i>Employees</a></li>
						<li><a href="<?php echo base_url();?>manager/tickets" class=""><i class="fa fa-ticket" ></i>Tickets</a></li>
						<li style="position: fixed;bottom: 0px; left: 0px; }">
						<a href="<?php echo base_url();?>manager/logout" class=""><i class="fa fa-sign-out" ></i> Log Out</a></li>
						<br>
						<br>
					</ul>
				</nav>
			</div>
		</div>
        <!-- LEFT SIDEBAR -->
        <!-- page-wrapper -->
		
        <div class="main">