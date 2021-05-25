<!-- Start Header -->
	<header>Hai <a href="<?php echo base_url('profil') ?>" title="Update profil">
<?php echo ucfirst($this->session->userdata('id_pelanggan')); ?></a> | <a href="<?php echo base_url('index.php/login_user/logout') ?>" title="Logout">Logout</a></header>
    <!-- Start Nav -->
    <nav>
    	<ul>
        	<li><a href="<?php echo site_url('dasbor') ?>">Dasbor</a></li>
            <li><a href="<?php echo site_url('Po') ?>">Data Permintaan Pembelian</a></li>
            <li><a href="<?php echo site_url('Po/Lihat_data') ?>">Lihat Data Pembelian Barang</a></li>
            <!--<li><a href="<?php echo base_url() ?>assets/templates.html">Templates</a></li>-->
        </ul>
    </nav>
    <!-- Start Article -->
    <article>
      <h1><?php echo $title ?></h1>