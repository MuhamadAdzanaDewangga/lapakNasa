<!DOCTYPE html>
<html>
<head>
	<title>New Account</title>

  <link href="<?= base_url('aset/')?>bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('aset/')?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <style type="text/css">
  	form input[type="Password"]:focus {
     outline: none !important;
     }
     form input[type="email"]:focus {
     outline: none !important;
     }
     form input[type="text"]:focus {
     outline: none !important;
     }


    .button{
    	background: green; 
    	color: white; 
    	width: 100%; 
    	height: 46px; 
    	border-radius: 22px;
    }
    .button:hover {
    	color: white;
    	background-color: #495249;
    }

    .a:focus{
    	transition: margin-top 1s;
    }

    .bentukform{
    	width: 90%; 
    	border: none;
    }
  </style>
</head>
<body>
	<div class="container" style="max-width: 400px !important;">
		<center  style="margin-top: 20px; margin-bottom: 30px;">
			<span>
				<img style="width: 120px;" src="<?= base_url('aset/gambar/')?>Logo_Nasa.jpg" alt="AVATAR">
			</span>
		</center>
		<?= $this->session->flashdata('message')?>

		<form style="margin-top: 50px;" method="post" action="<?= base_url('index.php/Controller_halLogin')?>">

		  <div style="width: 100%; height: 38px; margin-top: 30px;" >
		  	<div class="form-inline">
		  		<label for="Username" style="z-index: 200; cursor: auto;  margin-bottom: -28px; color: #989898;">Username</label>
		    	<input type="text" class="a bentukform" id="Username"  name="Username" value="<?= set_value('Username');?>">	
		    	
		  	</div>
		  	<hr id="1" style="margin-top: 7px; margin-bottom: -5px;">
		  	
		  	<?= form_error('Username','<small class="text-danger">','</small>')?>
		  </div>


		  <div style="width: 100%; height: 38px; margin-top: 38px;" >
		  	<div class="form-inline">
		  		<label for="Password" style="z-index: 200; cursor: auto;  margin-bottom: -28px; color: #989898;">Password</label>
		    	<input type="password" class="a bentukform" id="Password" name="Password" value="<?= set_value('Password');?>">	
		  	</div>
		  	<hr id="3" style="margin-top: 7px; margin-bottom: -5px;">
		  	
		  	<?= form_error('Password','<small class="text-danger">','</small>')?>
		  </div>
		  

		  <!-- <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div> -->
		  <center><button type="submit" class="btn shadow button mt-5 mb-5">Login</button></center>
		</form>
			<ul class="login-more p-t-190">

				<li>
					<span style="color: green; ">
						Don’t have an account?
					</span>

					<a href="<?php echo base_url('index.php/gotoFormNew') ?>" style="color: black;" class="txt2">
						Sign up
					</a>
				</li>
			</ul>

	</div>

<script type="text/javascript" src="<?= base_url('aset/')?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?= base_url('aset/')?>bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// usernaem
		if ($('#Username').val() == '') {
			$('#Username').css("margin-top", "0");
			$('#1').css('background-color', '#e5e5e5');
		} else {
			$('#Username').css("margin-top", "25px");
			$('#1').css('background-color', 'green');
		}

		// pasword
		if ($('#Password').val() == '') {
			$('#Password').css("margin-top", "0");
			$('#3').css('background-color', '#e5e5e5');
		} else {
			$('#Password').css("margin-top", "25px");
			$('#3').css('background-color', 'green');
		}

		
	})

	// username
	$('#Username').on('keyup', function(){
		if ($('#Username').val() == '') {
			$(this).css("margin-top", "0");
			$('#1').css('background-color', '#e5e5e5');
		} else {
			$(this).css("margin-top", "25px");
			$('#1').css('background-color', 'green');
		}	
	})

	// password
	$('#Password').on('keyup', function(){
		if ($('#Password').val() == '') {
			$(this).css("margin-top", "0");
			$('#3').css('background-color', '#e5e5e5');
		} else {
			$(this).css("margin-top", "25px");
			$('#3').css('background-color', 'green');
		}	
	})


	
</script>
</body>
</html>