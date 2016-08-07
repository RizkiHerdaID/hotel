<?php $this->load->view('header'); ?>
 <div class="confer">
	<script src="<?php echo base_url('assets/') ?>js/responsiveslides.min.js"></script>
	 <script>
    // You can also use "$(window).load(function() {"
    $(window).load((function () {
      $("#conference-slider").responsiveSlides({
      	auto: true,
        manualControls: '#slider3-pager',
      });
    }));
  </script>
  <div class="container">
    <h2><span>RUANG</span> & <span>RAPAT</span></h2>
    <div class="conference-slider">
	    <!-- Slideshow 3 -->
	    <ul class="conference-rslide" id="conference-slider">
	      <li><img src="<?php echo base_url('images/') ?>c1.jpg" alt=""></li>
	      <li><img src="<?php echo base_url('images/') ?>c2.jpg" alt=""></li>
	      <li><img src="<?php echo base_url('images/') ?>c3.jpg" alt=""></li>
		  <li><img src="<?php echo base_url('images/') ?>c4.jpg" alt=""></li>
		  <li><img src="<?php echo base_url('images/') ?>c5.jpg" alt=""></li>
		  <li><img src="<?php echo base_url('images/') ?>c6.jpg" alt=""></li>		 
	    </ul>
	    <!-- Slideshow 3 Pager -->
	    <ul id="slider3-pager">
	      <li><a href="#"><img src="<?php echo base_url('images/') ?>c11.jpg" alt=""></a></li>
		  <li><a href="#"><img src="<?php echo base_url('images/') ?>c22.jpg" alt=""></a></li>
		  <li><a href="#"><img src="<?php echo base_url('images/') ?>c33.jpg" alt=""></a></li>
		  <li><a href="#"><img src="<?php echo base_url('images/') ?>c44.jpg" alt=""></a></li>
	      <li><a href="#"><img src="<?php echo base_url('images/') ?>c55.jpg" alt=""></a></li>
	      <li><a href="#"><img src="<?php echo base_url('images/') ?>c66.jpg" alt=""></a></li>		
	    </ul>
    </div> 
	<h4>Conference Halls in Fortune Hotels</h4>
     <p>A big announcement, a new idea or a special occasion demands a venue to match. A name your guest will be delighted to see on the invitation - a place to impress, inspire and linger in the memory. It's a tall order. Allow us to make things a little easier for you with our collection of luxury London hotels.</p>
	 <p>Each Deluxe Hotels in World has its own unique personality. So you can give your event that unique atmosphere and feel. Between them all, Deluxe Hotels the  offer a huge range of room sizes and layouts that can be configured to your precise requirements. Whether you're arranging a board meeting or banquet, product launch or wedding, you've come to the right place.</p>
	 <p>The Charing Cross Hotel, has 9 meeting rooms, the largest of which can accommodate up to 150 people.</p>
	 <p>The Deluxe Hotel, near Marble Arch in London has 26 meeting rooms, the largest of which can accommodate up to 400 people. The Deluxe Hotel adjoining One Whitehall Place have 13 meeting rooms, the largest of which can accommodate up to 340 people.The Tower Hotel, near Tower Bridge in London has 19 meeting rooms, the largest of which can accommodate up to 600 people.</p>
	 <div class="sponcers">
		<div class="sponcers-head">
		<h5>Featured Sponsors</h5>
		</div>
	 </div>
	 <ul id="flexiselDemo1">
		<li>
			<div class="biseller-column">
			<img src="<?php echo base_url('images/') ?>s1.png" alt="">
			</div>
		</li>
		<li>
			<div class="biseller-column">
			<img src="<?php echo base_url('images/') ?>s2.png" alt="">
			</div>
		</li>
		<li>
			<div class="biseller-column">
			<img src="<?php echo base_url('images/') ?>s3.png" alt="">
			</div>
		</li>
		<li>
			<div class="biseller-column">
			<img src="<?php echo base_url('images/') ?>s2.png" alt="">
			</div>
		</li>
		<li>
			<div class="biseller-column">
			<img src="<?php echo base_url('images/') ?>s1.png" alt="">
			</div>
		</li>
		<li>
			<div class="biseller-column">
			<img src="<?php echo base_url('images/') ?>s3.png" alt="">
			</div>
		</li>
	</ul>
	<script type="text/javascript">
	 $(window).load(function() {
		$("#flexiselDemo1").flexisel({
			visibleItems: 3,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,    		
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: { 
				portrait: { 
					changePoint:480,
					visibleItems: 1
				}, 
				landscape: { 
					changePoint:640,
					visibleItems: 2
				},
				tablet: { 
					changePoint:768,
					visibleItems: 3
				}
			}
		});
		
	});
   </script>
   <script type="text/javascript" src="<?php echo base_url('assets/') ?>js/jquery.flexisel.js"></script>		
	 </div>
 </div>
 
 </div>
 
 <?php $this->load->view('footer'); ?>