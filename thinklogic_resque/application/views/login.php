<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>

	<body>
	    <div id="login">
	    	<center><img src="<?php echo base_url();?>images/logo2.png" alt="" height="136px" width="340px" style="padding-left:10.5px"/></center>
	      	<form name='form-login' method="post" action='<?php echo base_url('home/login') ?>'>

	      	<?php 
	      	if($this->session->flashdata('invalid') != ''){
	      		echo '<center><label class="text-danger" style="color: #ff5e5a;"><strong>Sorry! </strong>'. $this->session->flashdata('invalid') .'</label></center>';
	      	}
	      	?>
	      		<br>
		        <span class="fontawesome-user"></span>
		          <input type="text" id="user" placeholder="Username" name="username">
		        <span class="fontawesome-lock"></span>
		          <input type="password" id="pass" placeholder="Password" name="password">
		        <input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
