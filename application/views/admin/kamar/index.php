<div class="row">
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <div class="panel panel-warning">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4><?= $title ?></h4></div>
            <?php if ($this->session->flashdata('operation') != NULL) { ?>
                <div class="alert alert-<?= $this->session->flashdata('operation') ?>" role="alert">
                    <p><?= $this->session->flashdata('message'); ?></p>
                </div>
            <?php } ?>
            <!-- Table -->
            <table class="table">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Kamar</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kamar as $list): ?>
                        <tr
                            <?php
                            if ($list['status'] == 1)
                                echo 'class="danger"';
                            else
                                echo 'class="success"';
                            ?>
                        >
                            <td><?= $no++ ?></td>
                            <td><?= $list['numbers'] ?></td>
                            <td><?= $list['title'] ?></td>
                            <td>
                                <?php
                                if ($list['status'] == 1) {
                                    echo 'Terpakai';
                                } else {
                                    echo 'Tersedia';
                                }
                                ?>
                            </td>
                            <td>

                                <button class="btn btn-warning btn-xs <?php if ($list['status'] == 0) {
                                    echo 'disabled';
                                } ?> " onclick="detailData('<?= $list["idrooms"] ?>')">Detail Tamu
                                </button>
                                <button type="button"
                                    <?php
                                    if ($list['status'] == 1) {
                                        echo 'class="btn btn-muted btn-xs disabled"';
                                    } else {
                                        echo 'class="btn btn-danger btn-xs" onclick="confirmDeleteModal(\'' . $list["idrooms"] . '\')"';
                                    } ?>
                                >
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div class="panel panel-warning">
            <div class="panel-heading"><h4>Tambah <?= $title ?></h4></div>
            <div class="panel-body">

                <!-- alert -->
                <?php if ($this->session->flashdata('errors') != NULL) { ?>
                    <div class="alert alert-warning" role="alert">
                        <p><?= $this->session->flashdata('errors'); ?></p>
                    </div>
                <?php } ?>
                <!-- end of alert -->

                <form action="<?= site_url('admin/kamar/create') ?>" method="post" class="form-horizontal"
                      enctype="multipart/form-data" role="form">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="no_room">Nomor Kamar </label>
                            <div class="col-md-8">
                                <input id="no_room" name="no_room" type="text" placeholder=""
                                       class="form-control input-md">

                            </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="jenis">Jenis Kamar</label>
                            <div class="col-md-8">
                                <select id="jenis" name="jenis" class="form-control">
                                    <?php foreach ($jenis as $list): ?>
                                        <?php if ($this->session->flashdata('jenis') != NULL) {
                                            $tmp = $this->session->flashdata('jenis');
                                            if ($list['idclass'] == $tmp) { ?>
                                                <option value="<?= $list['idclass'] ?>"
                                                        selected><?= $list['title'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $list['idclass'] ?>"><?= $list['title'] ?></option>
                                            <?php }
                                        } else { ?>
                                            <option value="<?= $list['idclass'] ?>"><?= $list['title'] ?></option>
                                        <?php } endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Submit"></label>
                            <div class="col-md-4">
                                <button id="Submit" name="Submit" class="btn btn-warning">Simpan</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function confirmDeleteModal(id) {
        $('#deleteModal').modal();
        $('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData(' + id + ')">Hapus Data Kamar</a>');
    }

    function deleteData(id) {
        // do your stuffs with id
        window.location.assign("<?=site_url('admin/kamar/delete/')?>" + id)
        $('#deleteModal').modal('hide'); // now close modal
    }

    function detailData(id) {
        $.ajax({
            type: "POST",
            url: "<?=site_url('admin/kamar/details')?>",
            data: "id=" + id,
            success: function (msg) {
                $("#div_result").html(msg);
            }
        });
    }
</script>

<div id="deleteModal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Hapus Data Kamar</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus data kamar ini ?</p>
                <p>Kamar ini tidak akan tersedia lagi bagi tamu baru di masa datang. <br/>Namun, histori kamar ini akan
                    tetap ada di setiap transaksi yang pernah tercatat</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <span id='deleteButton'></span>
            </div>
        </div>
    </div>
</div>