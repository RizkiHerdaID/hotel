<?php

$dashboard_active = "";

$master_active = "";
$hak_akses_active = "";
$grup_active = "";
$tamu_active = "";
$jenis_active = "";
$kamar_active = "";
$makanan_active = "";
$jasa_active = "";

$registrasi_active = "";
$booking_active = "";
$check_active = "";
$approval_active = "";

$transaksi_active = "";
$pembayaran_active = "";
$piutang_active = "";

$laporan_active = "";
$keuangan_active = "";
$daftar_tamu_active = "";

if(isset($title)){
    switch($title){
        case "Dashboard":
            $dashboard_active = "active";
            break;
        case "Data Hak Akses":
        case "Detail Pengurus & Hak Akses":
        case 'Update Data Pengurus & Hak Akses':
            $master_active = "active";
            $hak_akses_active = "active";
            break;
        case "Data Grup Tamu":
        case 'Data Detail Grup Tamu':
        case 'Update Data Grup Tamu':
            $master_active = "active";
            $grup_active = "active";
            break;
        case "Data Tamu":
            $master_active = "active";
            $tamu_active = "active";
            break;
        case "Data Jenis Kamar":
            $master_active = "active";
            $jenis_active = "active";
            break;
        case "Data Kamar":
            $master_active = "active";
            $kamar_active = "active";
            break;
        case "Makanan & Minuman":
            $master_active = "active";
            $makanan_active = "active";
            break;
        case "Jasa Lainnya":
            $master_active = "active";
            $jasa_active = "active";
            break;

        case "Booking":
            $registrasi_active = "active";
            $booking_active = "active";
            break;
        case "Check-in & Check-out":
            $registrasi_active = "active";
            $check_active = "active";
            break;
        case "Approval":
            $registrasi_active = "active";
            $approval_active = "active";
            break;

        case "Pembayaran":
            $transaksi_active = "active";
            $pembayaran_active = "active";
            break;
        case "Piutang":
            $transaksi_active = "active";
            $piutang_active = "active";
            break;

        case "Laporan Keuangan":
            $laporan_active = "active";
            $keuangan_active = "active";
            break;
        case "Laporan Daftar Tamu":
            $laporan_active = "active";
            $daftar_tamu_active = "active";
            break;
  }
}

?>
<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      
      <p class="centered"><a href="profile.html"><img src="<?php echo base_url('images/') ?>ui-sam.jpg" class="img-circle" width="60"></a></p>
      <h5 class="centered">Rizki Herdatullah</h5>
      
      <li class="mt">
        <a class="<?= $dashboard_active ?>" href="<?php echo site_url('admin/Dashboard') ?>">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="<?= $master_active ?>">
          <i class="fa fa-desktop"></i>
          <span>Data Master</span>
        </a>
        <ul class="sub">
          <li class="<?= $hak_akses_active ?>"><a href="<?php echo site_url('admin/hakAkses') ?>">Data Hak Akses</a></li>
          <li class="<?= $grup_active ?>"><a  href="<?php echo site_url('admin/grup') ?>">Data Grup Tamu</a></li>
          <li class="<?= $tamu_active ?>"><a  href="<?php echo site_url('admin/tamu') ?>">Data Tamu</a></li>
          <li class="<?= $jenis_active ?>"><a  href="<?php echo site_url('admin/jenis') ?>">Data Jenis Kamar</a></li>
          <li class="<?= $kamar_active ?>"><a  href="<?php echo site_url('admin/kamar') ?>">Data Kamar</a></li>
          <li class="<?= $makanan_active ?>"><a  href="<?php echo site_url('admin/makanan') ?>">Makanan & Minuman</a></li>
          <li class="<?= $jasa_active ?>"><a  href="jasa">Jasa Lainnya</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-cogs <?= $registrasi_active ?>"></i>
          <span>Registrasi</span>
        </a>
        <ul class="sub">
          <li class="<?= $booking_active ?>"><a  href="#">Booking Kamar</a></li>
          <li class="<?= $check_active ?>"><a  href="#">Check-in / Check-out</a></li>
          <li class="<?= $approval_active ?>"><a  href="#">Approval</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-book <?= $transaksi_active ?>"></i>
          <span>Transaksi</span>
        </a>
        <ul class="sub">
          <li class="<?= $pembayaran_active ?>"><a  href="#">Pembayaran</a></li>
          <li class="<?= $piutang_active ?>"><a  href="#">Piutang</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-tasks <?= $laporan_active ?>"></i>
          <span>Laporan</span>
        </a>
        <ul class="sub">
          <li  class="<?= $keuangan_active ?>"><a  href="#">Laporan Keuangan</a></li>
          <li  class="<?= $daftar_tamu_active ?>"><a  href="#">Laporan Daftar Tamu</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->