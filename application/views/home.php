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
			 <!-- <div class="alert alert-warning" role="alert"><center>This Website is Underconstruction</center></div> -->
			 <div class="logo">
				 	<a href="index.html"><img src="<?php echo base_url('images/') ?>logo.png"/></a>
			 </div>
			 <span class="menu"> </span>
			 <div class="m-clear"></div>
			 <div class="top-menu">
				<ul>
					 <li class="active"><a href="<?php echo site_url('welcome'); ?>">BERANDA</a></li>
					 <li><a class="scroll" href="<?php echo site_url('facilities'); ?>">FASILITAS</a></li>
					 <li><a class="scroll" href="<?php echo site_url('restaurant'); ?>">RESTORAN</a></li>
					 <li><a class="scroll" href="<?php echo site_url('conference'); ?>">RUANG & RAPAT</a></li>
					 <li><a class="scroll" href="<?php echo site_url('booking'); ?>">PEMESANAN</a></li>
					 <li><a class="scroll" href="<?php echo site_url('contact'); ?>">HUBUNGI KAMI</a></li>
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
	  <div class="banner">
			<div class="banner-info text-center">
			<h3><label> Selamat Datang</label>	</h3>
			<h1>HOTEL FORTUNE</h1>
			<span></span>
			<ul>
			 <li><a class="scroll" href="#">HOTEL</a><i class="line"></i></li>
			 <li><a class="scroll" href="#">SPA SALOON</a><i class="line2"></i></li>
			 <li><a class="scroll" href="#">FINE DINING</a></li>
			 <div class="clearfix"></div>
			</ul>
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

<script type="text/javascript">
	(function() {
		JC.init({
			domainKey: ''
		});
	})();
</script>
<div class="online_reservation">
		   <div class="b_room">
			  <div class="booking_room">
				  <div class="reservation">
					  <ul>				
						 <li  class="span1_of_1 left">
							 <h5>Check-in</h5>
							 <div class="book_date">
								 <form>
								 <input class="date" id="datepicker" type="text" value="<?php echo $today ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '2/08/2013';}">
								 </form>
							 </div>					
						 </li>
						 <li  class="span1_of_1 left">
							 <h5>Check-out</h5>
							 <div class="book_date">
							 <form>
								<input class="date" id="datepicker1" type="text" value="<?php echo $today ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '22/08/2013';}">
							 </form>
						     </div>		
						 </li>
						 <li class="span1_of_1">
							 <h5>Tipe Kamar</h5>
							 <!----------start section_room----------->
							 <div class="section_room">
							      <select id="country" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Standard Single Room</option>
										<option value="null">Suite room</option>         
										<option value="AX">Single room</option>
										<option value="AX">Double room</option>
							      </select>
							 </div>	
						 </li>
						 <li class="span1_of_3">
								<div class="date_btn">
									<form>
										<input type="submit" value="Perlihatkan Harga" />
									</form>
								</div>
						 </li>
						 <div class="clearfix"></div>
					 </ul>
				 </div>
			  </div>
				<div class="clearfix"></div>
		  </div>
	  </div>
</div>
<!---->
<div class="package text-center">
	 <div class="container">
		 <h3>Pesan Paket Liburan</h3>
		 <p>Sed euismod sem id consequat rutrum. Ut convallis lorem a orci mollis, eu vulputate libero aliquet. Praesent egestas nisi sed purus tincidunt faucibus. Aliquam lobortis orci lacus, sed faucibus augue dapibus vitae. Ut vitae mi sapien. Phasellus a eros justo.
		 Curabitur odio massa, tincidunt nec nibh sit amet</p>
		<!-- requried-jsfiles-for owl -->
				<link href="<?php echo base_url('assets/') ?>css/owl.carousel.css" rel="stylesheet">
							    <script src="<?php echo base_url('assets/') ?>js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : true,
							        navigationText :  false,
							        pagination : false,
							      });
							    });
							    </script>
			<!-- //requried-jsfiles-for owl -->
		  <div id="owl-demo" class="owl-carousel">
			  <div class="item text-center image-grid">	
					<ul>
					 <li><img src="<?php echo base_url('images/') ?>1.jpg" alt=""></li>			    
					 <li><img src="<?php echo base_url('images/') ?>2.jpg" alt=""></li>				 
					 <li><img src="<?php echo base_url('images/') ?>3.jpg" alt=""></li>
					 </ul>
			  </div>
			  <div class="item text-center image-grid">	
					<ul>
					<li> <img src="<?php echo base_url('images/') ?>3.jpg" alt=""></li>			    
					 <li><img src="<?php echo base_url('images/') ?>4.jpg" alt=""></li>				 
					 <li><img src="<?php echo base_url('images/') ?>5.jpg" alt=""></li>
					 </ul>
			  </div>
			  <div class="item text-center image-grid">	
					<ul>
					<li> <img src="<?php echo base_url('images/') ?>6.jpg" alt=""></li>			    
					 <li><img src="<?php echo base_url('images/') ?>2.jpg" alt=""></li>				 
					 <li><img src="<?php echo base_url('images/') ?>8.jpg" alt=""></li>
					 </ul>
			  </div>
		  </div> 		
	 </div>
</div>
<!---->
<!---->
<div class="rooms text-center">
	 <div class="container">
		 <h3>Tipe Kamar Kami</h3>
		 <div class="room-grids">
			 <div class="col-md-4 room-sec">
				 <img src="<?php echo base_url('images/') ?>pic1.jpg" alt=""/>
				 <h4>Standard Double Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="<?php echo base_url('images/') ?>pic2.jpg" alt=""/>
				 <h4>Supperior Double Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">					
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="<?php echo base_url('images/') ?>pic3.jpg" alt=""/>
				 <h4>Family Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
			 <div class="col-md-4 room-sec">
				 <img src="<?php echo base_url('images/') ?>pic4.jpg" alt=""/>
				 <h4>Standard Single Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="<?php echo base_url('images/') ?>pic5.jpg" alt=""/>
				 <h4>Supperior Single Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="<?php echo base_url('images/') ?>pic6.jpg" alt=""/>
				 <h4>VIP Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<?php $this->load->view('footer'); ?>