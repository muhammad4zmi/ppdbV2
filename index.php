<?php
session_start();
//cek session untuk Admin
include "cek_login.php";
include "config/config.php";
//connectToDB(); //fungsi koneksi ke database
if (isset($_GET['admin'])) {
    $menu = antiinjection($_GET['admin']);
} else {
    $menu = '';
}

$q = mysqli_query($link,'select ID, ReceivingDateTime,SenderNumber,TextDecoded from inbox where ID') or die('Gagal');
$counter = 0;
$now = date('Y-m-d');
$online = date('d-m-Y');
$jam = date("h:m");
while ($r = mysqli_fetch_array($q)) {
    $a = $r['ReceivingDateTime'];
    $pengirim = $r['SenderNumber'];
    $pesan = $r['TextDecoded'];
    $tgl = substr($a, 0, 10);
    if ($tgl == $now)
        $counter++;
}
$gagal=mysqli_query($link,'select * from sentitems where Status="SendingError"');
    $gl=0;
    while ($g1=mysqli_fetch_array($gagal)) {
        $gl++;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PPBD MA Mu'allimin NW Anjani </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="images/logo.jpg">

  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>PPBD 2017</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/logo.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>User</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3><?php echo $online?></h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  
                </li>
                <li><a href="?admin=dt_siswa"><i class="fa fa-desktop"></i> Data Master </a>
                  
                </li>
                <li><a><i class="fa fa-envelope-o"></i> SMS <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?admin=kirim_pesan"><i class="fa fa-angle-double-right"></i> Kirim Info</a></li>
                                <li><a href="index.php?admin=inbox" data-toggle='tooltip' data-original-title='<?php echo $counter; ?> Pesan Masuk Hari Ini'><i class="fa fa-angle-double-right"></i> Inbox<small class="badge pull-right bg-green"><?php echo $counter; ?></small></a></li>
                                <li><a href="index.php?admin=outbox"><i class="fa fa-angle-double-right"></i> Outbox</a></li>
                                <li><a href="?admin=sentitem" data-toggle='tooltip' data-original-title='<?php echo $gl; ?> Pesan Gagal'><i class="fa fa-angle-double-right"></i> Send<small class="badge pull-right bg-red"><?php echo $gl; ?></small></a></li>
                   
                  </ul>
                </li>
                <li><a href="#"  data-toggle="modal" data-target="#keluarModal"><i class="fa fa-power-off"></i> Keluar</a>
                  
                </li>
               
              </ul>
            </div>
           

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <!-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div> -->
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/logo.jpg" alt="">Admin
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                 
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  
                  <li><a href="#"  data-toggle="modal" data-target="#keluarModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
      
    <?php
    include "load-modules.php";
    ?>
        <!-- top tiles -->
        
        <!-- /top tiles -->

       


        </div>

        <!-- footer content -->

        <!-- <footer>
          <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>
  <div class="modal fade" id="keluarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-power-off fa-fw fa-lg"></i> Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Anda Yakin ingin Keluar dari Aplikasi ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="logout-admin.php" type="button" class="btn btn-primary">Ya, Keluar <i class="fa fa-sign-out fa-fw fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

  <!-- <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div> -->

  <script src="js/bootstrap.min.js"></script>

 <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/custom.js"></script>
  <!-- form wizard -->
  <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  
</body>

</html>
