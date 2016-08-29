<div class="col-lg-9" style="margin-top:-25px">
    <!-- Informasi Kamar yang Tersedia -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Informasi Kamar Yang Tersedia</h4>
                    <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Jenis Kamar</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Fasilitas</th>
                        <th><i class="fa fa-bookmark"></i> Harga/Malam</th>
                        <th><i class=" fa fa-edit"></i> Kamar Kosong</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($daftar_kamar as $list) { ?>
                        <tr>
                            <td><?= $list['title'] ?></td>
                            <td><?= $list['fasilitas'] ?></td>
                            <td><?= 'Rp. ' . number_format($list['price'], '0', '', '.') . ',-' ?></td>
                            <td><?= $list['kamar_kosong'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <!-- End Informasi kamar tersedia -->
    <!-- Daftar Tamu Yang Sudah Booking -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Daftar Tamu Yang Sudah Booking</h4>
                    <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Kode Booking</th>
                        <th><i class="fa fa-bookmark"></i> Nama</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Tanggal Booking</th>
                        <th><i class=" fa fa-edit"></i> Telepon / HP</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($daftar_booking as $booking) { ?>
                        <tr>
                            <td>
                                <a href="basic_table.html#">
                                    <?= $booking['kode'] ?>
                                </a>
                            </td>
                            <td><?= $booking['nama_depan'] . ' ' . $booking['nama_belakang'] ?></td>
                            <td><?php echo date('d M Y', strtotime(str_replace('-', '/', $booking['tgl_order']))); ?></td>
                            <td><?= $booking['telepon'] ?></td>
                            <td>
                                <button class="btn btn-primary btn-xs" onclick="checkIn('<?= $booking["id"] ?>')">
                                    Check-in
                                </button>
                                <button class="btn btn-danger btn-xs"
                                        onclick="confirmDeleteModal('<?= $booking["booking_id"] ?>')">Batalkan
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <script type="text/javascript">
        function confirmDeleteModal(id) {
            $('#deleteModal').modal();
            $('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData(' + id + ')">Batalkan</a>');
        }

        function deleteData(id) {
            // do your stuffs with id
            window.location.assign("<?=site_url('admin/booking/delete/')?>" + id + '/true')
            $('#deleteModal').modal('hide'); // now close modal
        }

        function checkIn(ktp) {
            // do your stuffs with id
            window.location.assign("<?=site_url('admin/check/viewCreate/')?>" + ktp + "/true")
            $('#deleteModal').modal('hide'); // now close modal
        }
    </script>
    <div id="deleteModal" class="modal fade" role='dialog'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Hapus Jasa </h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan membatalkan <strong> data booking </strong> ini ?</p>
                    <p>Jika yakin silahkan klik tombol Batalkan</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <span id='deleteButton'></span>
                </div>

            </div>
        </div>
    </div>
</div><!-- /col-lg-9 END SECTION MIDDLE -->
<div class="col-lg-3 ds">
    <?php $this->load->view('admin/notification') ?>
</div><!-- /col-lg-3 -->
