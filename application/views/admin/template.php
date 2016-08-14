<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title><?= $title ?> - Administrator</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets_ad/') ?>css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets_ad/') ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_ad/') ?>css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_ad/') ?>css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_ad/') ?>js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_ad/') ?>lineicons/style.css">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets_ad/') ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_ad/') ?>css/style-responsive.css" rel="stylesheet">
    <script src="<?php echo base_url('assets_ad/') ?>/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b><?= $title ?> - Administrator</b></a>
        <!--logo end-->
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="login.html">Logout</a></li>
          </ul>
        </div>
      </header>
      <!--header end-->
      <?php $this->load->view('admin/sidebar'); ?>
      <!--footer start-->
      <footer class="site-footer">
        <div class="text-center">
          2014 - Alvarez.is
          <a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
          </a>
        </div>
      </footer>
      <!--footer end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12 main-chart">
              <?php $this->load->view($content); ?>
            </div>
          </div>
        </section>
      </section>
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets_ad/') ?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url('assets_ad/') ?>/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('assets_ad/') ?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url('assets_ad/') ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url('assets_ad/') ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets_ad/') ?>/js/jquery.sparkline.js"></script>
    <!--common script for all pages-->
    <script src="<?php echo base_url('assets_ad/') ?>/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets_ad/') ?>/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets_ad/') ?>/js/gritter-conf.js"></script>
    <!--script for this page-->
    <script src="<?php echo base_url('assets_ad/') ?>/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url('assets_ad/') ?>/js/zabuto_calendar.js"></script>
<!--  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Hi, Mr. Admin!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
            // (string | optional) the image to display on the left
            image: '<?php echo base_url('assets_ad/') ?>/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script> -->
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
