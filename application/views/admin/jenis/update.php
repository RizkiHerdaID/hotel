<?php foreach ($jenis as $list): ?>
    <?php
    $tmp = $list['fasilitas'];
    $fasilitas = explode(",", $tmp);
    ?>
    <form action="<?= site_url('admin/jenis/update') ?>" method="post" class="form-horizontal"
          enctype="multipart/form-data" role="form">
        <div class="col-lg-8">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4><?= $title ?></h4></div>
                <div class="panel-body">

                    <!-- alert -->
                    <?php if ($this->session->flashdata('errors') != NULL) { ?>
                        <div class="alert alert-warning" role="alert">
                            <p><?= $this->session->flashdata('errors'); ?></p>
                        </div>
                    <?php } ?>
                    <!-- end of alert -->

                    <fieldset>
                        <input id="idclass" name="idclass" type="text" placeholder="" value="<?= $list['idclass'] ?>"
                               hidden/>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="no">Kode Jenis</label>
                            <div class="col-md-8">
                                <input id="no" name="no" type="text" placeholder="" value="<?= $list['kode_jenis'] ?>"
                                       class="form-control input-md" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="jenis">Nama Jenis Kamar</label>
                            <div class="col-md-8">
                                <input id="jenis" name="jenis" type="text" placeholder="" value="<?= $list['title'] ?>"
                                       class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="harga">Harga Kamar</label>
                            <div class="col-md-8">
                                <input id="harga" name="harga" type="text" placeholder="" value="<?= $list['price'] ?>"
                                       class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tahun">Tahun Jenis</label>
                            <div class="col-md-8">
                                <select id="tahun" name="tahun" class="form-control">
                                    <?php for ($i = $tahun; $i >= 2000; $i--) { ?>
                                        <?php if ($i == $list['tahun']) { ?>
                                            <option value="<?= $i ?>" selected><?= $i ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="checkboxes">Fasilitas</label>
                            <div class="col-md-8">
                                <?php $i = 1;
                                foreach ($facilities as $list): ?>
                                    <?php if (in_array($list['nama'], $fasilitas)) { ?>
                                        <label class="checkbox-inline" for="facilities-<?= $i ?>"
                                               style="margin-right:5pt;">
                                            <input type="checkbox" name="facilities[]" id="facilities-<?= $i++ ?>"
                                                   value="<?= $list['nama'] ?>" checked="true">
                                            <?= $list['nama'] ?>
                                        </label>
                                    <?php } else { ?>
                                        <label class="checkbox-inline" for="facilities-<?= $i ?>"
                                               style="margin-right:5pt;">
                                            <input type="checkbox" name="facilities[]" id="facilities-<?= $i++ ?>"
                                                   value="<?= $list['nama'] ?>">
                                            <?= $list['nama'] ?>
                                        </label>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="photo">Foto Kamar</label>
                            <div class="col-md-8">
                                <input id="photo" name="photo" class="input-file" type="file">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="panel-footer">
                    <a href="javascript:back()" class="btn btn-warning">Kembali</a>
                    <button id="Submit" name="Submit" class="btn btn-success pull-right">Simpan</button>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>
<script>
    function back() {
        $.ajax({
            type: "POST",
            url: "<?=site_url('admin/jenis/')?>",
            data: "back=" + true,
            success: function (msg) {
                $("#div_result").html(msg);
            }
        });
    }
</script>
