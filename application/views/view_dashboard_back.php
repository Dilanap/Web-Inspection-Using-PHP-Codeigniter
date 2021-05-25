<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT Hino Motors Manufacturing Indonesia</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ;?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ;?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts and icon -->
    <link href="<?php echo base_url() ;?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery for 1. tombol data tambah/update/delet dan pengaruh ke table-->
    <script src="<?php echo base_url() ;?>assets/calendar/jquery.min.js"></script>

     <!-- DataTables pengaruh ke table-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/datatable/datatables/dataTables.bootstrap.css">


    <!-- Bootstrap Core JavaScript pengaruh ke menu dropdown sidebar -->
    <script src="<?php echo base_url() ;?>assets/js/bootstrap.min.js"></script>

 <!--Fullcalendar Start-->
  <link href='<?php echo base_url(); ?>assets/calendar/fullcalendar.min.css' rel='stylesheet' />
  <link href='<?php echo base_url(); ?>assets/slider.css'  rel='stylesheet' />
  <link href='<?php echo base_url(); ?>assets/calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

  <script src='<?php echo base_url(); ?>assets/calendar/moment.min.js'></script>
  <script src='<?php echo base_url(); ?>assets/calendar/fullcalendar.min.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
   $this->session->userdata('jabatan');
?> 

<body>

<div id="wrapper">

    <div class="jumbotron">
	<hr/><center><font color="#660066">

<style>
.jam {
 font-family : tahoma;
 font-weight : ;
 font-size : 11px;
 position : relative;
 top : 0px;
 left : 0px;
 }
</style>
<script language="javascript">
<!--
function tampilkanjam()
 {
 var waktu = new Date();
 var jam = waktu.getHours();
 var menit = waktu.getMinutes();
 var detik = waktu.getSeconds();
 var teksjam = new String();
 if ( jam <= 9 )
 jam = "0" + jam;
 if ( menit <= 9 )
 menit = "0" + menit;
 if ( detik <= 9 )
 detik = "0" + detik;
 teksjam = jam + ":" + menit + ":" + detik;
 tempatjam.innerHTML = teksjam;
 setTimeout ("tampilkanjam()",1000);
 }
 window.onload = tampilkanjam
 //-->
</script>
 </font>

<font color='blackwhite'>
<div id="tempatjam" ></div>
</font>

<script language="javascript">
<!--
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jum'at Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober Nopember Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " - " + namabulan[bulan] + " - " + tahun;
document.write(tanggallengkap);
//--> </script>
</center><hr/>
    <h1 align="center">  <?php echo $this->session->userdata('id_pengguna') ;?><br> --Selamat Datang--</h1>
   <!-- <p align="center"> <marquee>  Sistem Informasi A3 Report PT Hino Motors Manufacturing Indonesia</marquee></p>-->
	 <br>
	 
            <div class ="slider" align="center">
            <div class=isi-slider>
            <img src="<?php echo base_url();?>images/gambar1.png" alt="Gambar 1" >
			<img src="<?php echo base_url();?>images/gambar2.jpg" alt="Gambar 2" >
			<img src="<?php echo base_url();?>images/gambar3.jpg" alt="Gambar 3" >
                </div>
                 </div>
        <br>
</a>
</div>
   
    
        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: black">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<p align = "left"><img src="<?php echo base_url();?>images/gambar1.png" alt="Gambar 1" width="50px" height="50px">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
				
				<a  class="navbar-brand"  style="color: #fffcfc;">PT Hino Motors Manufacturing Indonesia </a></p>
            </div>
    
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             
                
                <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fffcfc;">
					<i class="fa fa-user" style="color: #fffcfc;"></i>  Hallo  
					<?php echo $this->session->userdata('username'); ?> <b class=""></b></a>
                    
                </li>
            </ul>
        </a>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background-color: #000033">
                    <li>
                        <a href="<?php echo site_url('Dashboard');?>" style="color: #fffcfc;"><i class="fa fa-home"></i> Halaman Utama </a>
                    </li>
					 <li>
                    

<?php if ($this->session->userdata('jabatan')=='Operator' )
            { 
            ?> 

                    <li>
 <li>
                    <a href="<?php echo site_url('jadwal');?>" style="color: #fffcfc;"> <i class="fa fa-fw fa-edit"></i> Jadwal Pemeriksaan</a>
                    </li>
					
					
					
					 <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#laporan" style="color: #fffcfc;"><i class="fa fa-fw fa-table"></i> Check Sheet Inspection <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="laporan" class="collapse">
                    <li>
                    <a href="<?php echo site_url('Cs');?>"> <i class="fa fa-fw fa-edit"></i> Form Check Sheet</a>
                    </li>
                    <li>
                    <a href="<?php echo site_url('Cs/lihat_data_ok');?>"> <i class="fa fa-fw fa-info"></i> Part OK</a>
                    </li>  
					 <li>
                    <a href="<?php echo site_url('Cs/lihat_data');?>"> <i class="fa fa-fw fa-info"></i> Part NG</a>
                    </li>  
                    </ul>
                    </li>                       
                    <li>
					
					
					
					<li>
                    <a href="<?php echo site_url('Cs/lihat_data_cpar/');?>" style="color: #fffcfc;"> <i class="fa fa-fw fa-edit"></i> CPAR</a>
                    </li>
                    </li>
           
                    </li>

    <?php
    }
    ?>
    <?php if ($this->session->userdata('jabatan')=='Section_head') 
            { 
            ?> 

                    
                    <li>
                    <a href="<?php echo site_url('jadwal1');?>"> <i class="fa fa-fw fa-edit"></i> Jadwal Pemeriksaan</a>
                    </li>
					 <?php
    }
    ?>
	
	<?php if ($this->session->userdata('jabatan')=='Kepala_departemen') 
            { 
            ?> 

                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demos2" style="color: #fffcfc;"><i class="fa fa-fw fa-arrows-v"></i> Data CPAR <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demos2" class="collapse">
                    <li>
                    <li>
                    <a href="<?php echo site_url('Cpar/validasi_cpar');?>"> <i class="fa fa-fw fa-edit"></i> Menunggu Validasi</a>
                    </li>
					 <li>
                    <a href="<?php echo site_url('Cpar/datacpar');?>"> <i class="fa fa-fw fa-edit"></i>CPAR</a>
                    </li>
                   
                    </li>
                    </ul>
                    </li>
					
					   <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#laporan" style="color: #fffcfc;"><i class="fa fa-fw fa-table"></i> Laporan <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="laporan" class="collapse">
                    <li>
                    <a href="<?php echo site_url('Laporan/pemeriksaan');?>"> <i class="fa fa-fw fa-edit"></i> Laporan Pemeriksaan</a>
                    </li>
					<li>
                    <a href="<?php echo site_url('A3/tampil_report_masuk');?>"> <i class="fa fa-fw fa-edit"></i> A3 Report</a>
                    </li>
                              
                    </ul>
                    </li>                       
                    <li>

					
					 <?php
    }
    ?>
	
    <?php if ($this->session->userdata('jabatan')=='Section_Trimming') 
            { 
            ?> 
					
					<li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo" style="color: #fffcfc;"><i class="fa fa-fw fa-table"></i> Tindakan Perbaikan <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                   
					 <li>
                    <a href="<?php echo site_url('Checksheet/cpar1');?>"> <i class="fa fa-fw fa-edit"></i>CPAR</a>
                    </li>
				   
				   
				   <li>
                    <a href="<?php echo site_url('Checksheet/cpar2');?>"> <i class="fa fa-fw fa-edit"></i>Problem Report Input</a>
                    </li>
					 <li>
                    <a href="<?php echo site_url('A3/lihat_data');?>"> <i class="fa fa-fw fa-edit"></i>Problem Report Tervalidasi</a>
                    </li>
                    </ul>
                    </li>
					


    <?php
    }
    ?>
	
    <li>
          <a href="<?php echo site_url('auth/logout');?>" style="color: #fffcfc;"><i class="glyphicon glyphicon-log-out"></i> Log Out
           
            </a>
        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

<div class="container-fluid">

 <div class="panel-heading"></div>
    
    
<?php 
echo $this->template->content;

?>

</body>
                         
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div>
                        <body>
                            <center>
                                
                            </center>
                        </body>
                    </div>
                    <!-- /.panel -->
                    <div style="text-align: center; " id="non"><font color="black">PT Hino Motors Manufacturing Indonesia </font><span class="copyright">&copy; <font color="black">2020 <a href="http://stmi.ac.id">Politeknik STMI</a></font></a>.</span></div>
                </div>
    <!-- jQuery -->
    

    <!-- DataTables JavaScript -->
    <!-- DataTables -->
    <script src="<?php echo base_url()?>assets/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/datatable/datatables/dataTables.bootstrap.min.js"></script>
  
 <script>
    $(document).ready(function(){    
    $('#example1').DataTable({ columnDefs: [{ "defaultContent": "-", "targets": "_all" }] });});

  </script>
 



    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
