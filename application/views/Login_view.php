<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="<?php echo base_url() ?>assets/images/logo-javawebmedia.png" rel="shortcut icon">
<title><?php echo $title ?></title>
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
<section class="login">
	<h1>Login Page</h1>
	<?php
	//cetak session
	if ($this->session->flashdata('sukses')){
		echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
	}
	
	//cetak error
	echo validation_errors('<p class="warning" style="margin: 10px 20px;">', '</p>');
	?>
    <form action="<?php echo base_url('index.php/login_user') ?>" method="post">
      <p>
        <label for="Id_peg">ID Pegawai</label>
        <input type="text" name="Id_peg" id="Id_pegawai" placeholder="ID Pegawai">
        
      </p>
      <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
      </p>
      <p>
        <input type="submit" name="submit" id="submit" value="Login" class="full">
      </p>
    </form>
    <footer>Web design by <a href="http://javawebmedia.com" title="School of graphic &amp; web design" target="_blank">Java Web Media</a></footer>
</section>
</body>
</html>
