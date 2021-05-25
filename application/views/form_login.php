<?php
// untuk mendirect
echo form_open('auth/login');
?>

<html>
<head>
<link href='<?php echo base_url(); ?>assets/csslogin/style.css' rel='stylesheet' />
</head>
<body>
<div class="form-wrapper">
  
  <!--<form action="dashboard.php" method="post"> -->
    <h3 align ="center">Login</h3>
	
    <div class="form-item">
		<input type="text" name="username" placeholder="Username" autofocus></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" placeholder="Password" ></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button"  name="submit" value="login"></input><br>
    </div>
	
  </form>
  


<!--<input type="text" name="username" placeholder="username">
<input type="password" name="password" placeholder="password">
<button type="submit" name="submit">Login</button>
</form> --!>