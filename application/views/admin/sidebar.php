<?php

$level = $this->session->userdata('group_id');

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

if (isset($title)) {
    switch ($title) {
        case "Dashboard":
            $dashboard_active = "active";
            break;
        case "Daftar Pengguna & Hak Akses":
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
        case "Detail Data Tamu":
        case "Update Data Tamu":
            $master_active = "active";
            $tamu_active = "active";
            break;
        case "Data Jenis Kamar":
        case "Detail Data Jenis Kamar":
        case "Update Data Jenis Kamar":
            $master_active = "active";
            $jenis_active = "active";
            break;
        case "Data Kamar":
        case "Detail Data kamar":
            $master_active = "active";
            $kamar_active = "active";
            break;
        case "Data Makanan & Minuman":
        case "Update Data Makanan & Minuman":
            $master_active = "active";
            $makanan_active = "active";
            break;
        case "Data Jasa":
        case "Update Data Jasa":
            $master_active = "active";
            $jasa_active = "active";
            break;

        case "Data Booking":
        case "Tambah Data Booking":
        case "Booking - Cari Tamu":
            $registrasi_active = "active";
            $booking_active = "active";
            break;
        case "Data Check-in & Check-out":
        case "Tambah Data Check-in":
        case "Check-in - Cari Tamu":
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
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="<?php echo base_url('images/') ?>ui-sam.jpg"
                                                            class="img-circle" width="60"></a></p>
            <h5 class="centered"><?=$this->session->userdata('nama_user')?></h5>
            <h4 class="centered"><?=$this->session->userdata('description')?> Hotel</h4>


            <li class="mt">
                <a class="<?= $dashboard_active ?>" href="<?php echo site_url('admin/Dashboard') ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if($level == 1 || $level == 2) { ?>
            <li class="sub-menu">
                <a href="javascript:;" class="<?= $master_active ?>">
                    <i class="fa fa-desktop"></i>
                    <span>Data Master</span>
                </a>
                <ul class="sub">
                    <li class="<?= $hak_akses_active ?>"><a href="<?php echo site_url('admin/hakAkses') ?>">Data Hak
                            Akses</a></li>
                    <li class="<?= $grup_active ?>"><a href="<?php echo site_url('admin/grup') ?>">Data Grup Tamu</a>
                    </li>
                    <li class="<?= $tamu_active ?>"><a href="<?php echo site_url('admin/tamu') ?>">Data Tamu</a></li>
                    <li class="<?= $jenis_active ?>"><a href="<?php echo site_url('admin/jenis') ?>">Data Jenis
                            Kamar</a></li>
                    <li class="<?= $kamar_active ?>"><a href="<?php echo site_url('admin/kamar') ?>">Data Kamar</a></li>
                    <li class="<?= $makanan_active ?>"><a href="<?php echo site_url('admin/makanan') ?>">Makanan &
                            Minuman</a></li>
                    <li class="<?= $jasa_active ?>"><a href="<?php echo site_url('admin/jasa') ?>">Fasilitas & Jasa Lainnya</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($level == 1 || $level == 3) { ?>
            <li class="sub-menu">
                <a href="javascript:;" class="<?= $registrasi_active ?>">
                    <i class="fa fa-cogs"></i>
                    <span>Registrasi</span>
                </a>
                <ul class="sub">
                    <li class="<?= $booking_active ?>"><a href="<?php echo site_url('admin/booking') ?>">Booking
                            Kamar</a></li>
                    <li class="<?= $check_active ?>"><a href="<?php echo site_url('admin/check') ?>">Check-in /
                            Check-out</a></li>
                    <li class="<?= $approval_active ?>"><a href="<?php echo site_url('admin/approval') ?>">Approval</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($level == 1 || $level == 4) { ?>
            <li class="sub-menu">
                <a href="javascript:;" class="<?= $transaksi_active ?>">
                    <i class="fa fa-book"></i>
                    <span>Transaksi</span>
                </a>
                <ul class="sub">
                    <li class="<?= $pembayaran_active ?>"><a href="<?php echo site_url('admin/pembayaran') ?>">Pembayaran</a>
                    </li>
                    <li class="<?= $piutang_active ?>"><a href="<?php echo site_url('admin/pembayaran/piutang') ?>">Piutang</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($level == 1 || $level == 2) { ?>
            <li class="sub-menu">
                <a href="javascript:;" class="<?= $laporan_active ?>">
                    <i class="fa fa-tasks"></i>
                    <span>Laporan</span>
                </a>
                <ul class="sub">
                    <li class="<?= $keuangan_active ?>"><a target="_blank" href="<?php echo site_url('admin/laporan/keuangan') ?>">Laporan Keuangan</a></li>
                    <li class="<?= $daftar_tamu_active ?>"><a target="_blank" href="<?php echo site_url('admin/laporan/tamu') ?>">Laporan Daftar Tamu</a></li>
                </ul>
            </li>
            <?php } ?>
            <li class="sub-menu" >
                <a href="javascript:confirmLogoutModal();" class="">
                    <i class="glyphicon glyphicon-log-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<script type="text/javascript">
    function confirmLogoutModal(){
        $('#logoutModal').modal();
        $('#logoutButton').html('<a class="btn btn-primary" onclick="logout()">Ya</a>');
    }

    function logout(){
        // do your stuffs with id
        window.location.assign("<?=site_url('auth/logout')?>");
        $('#logoutModal').modal('hide'); // now close modal
    }
</script>
<div id="logoutModal" class="modal fade bs-example-modal-sm" role='dialog'>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Anda Yakin ingin Logout</h4>
            </div>
            <div class="modal-body">
                Pilih "Ya" Jika Anda yakin.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <span id= 'logoutButton'></span>
            </div>

        </div>
    </div>
</div>