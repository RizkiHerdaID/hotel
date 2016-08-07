<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Underconstruction - Hotels in Jember</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url('assets/') ?>css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="<?php echo base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
</head>
<body>
<!--header starts-->
<div class="header">
	 <div class="top-header">
		 <div class="container">
			 <div class="logo">
				 	<a href="index.html"><img src="<?php echo base_url('images/') ?>logo.png"/></a>
			 </div>
			 <span class="menu"> </span>
			 <div class="m-clear"></div>
			 <div class="top-menu">
				<ul>
					 <?php $active = $this->uri->segment(1, 0) ?>

					 <li <?php if($active == 'welcome') echo 'class="active"><a '; else echo '><a class="scroll" ';?> href="<?php echo site_url('welcome'); ?>">BERANDA</a></li>
					 <li <?php if($active == 'facilities') echo 'class="active"><a '; else echo  '><a class="scroll" ';?> href="<?php echo site_url('facilities'); ?>">FASILITAS</a></li>
					 <li <?php if($active == 'restaurant') echo 'class="active"><a '; else echo  '><a class="scroll" ';?> href="<?php echo site_url('restaurant'); ?>">RESTORAN</a></li>
					 <li <?php if($active == 'conference') echo 'class="active"><a '; else echo  '><a class="scroll" ';?> href="<?php echo site_url('conference'); ?>">RAPAT & ACARA</a></li>
					 <li <?php if($active == 'booking') echo 'class="active"><a '; else echo  '><a class="scroll" ';?> href="<?php echo site_url('booking'); ?>">PEMESANAN</a></li>
					 <li <?php if($active == 'contact') echo 'class="active"><a '; else echo  '><a class="scroll" ';?> href="<?php echo site_url('contact'); ?>">HUBUNGI KAMI</a></li>
				</ul>
				<script>
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle(200);
					});
				</script>
			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
	 
</div>
<!---strat-date-piker---->
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery-ui.css" />
<script src="<?php echo base_url('assets/') ?>js/jquery-ui.js"></script>
		  <script>
				  $(function() {
				    $( "#datepicker,#datepicker1" ).datepicker();
				  });
		  </script>
<!---/End-date-piker---->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/') ?>css/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/') ?>css/JFFormStyle-1.css" />
<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/JFCore.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/JFForms.js"></script>
<!-- Set here the key for your domain in order to hide the watermark on the web server -->