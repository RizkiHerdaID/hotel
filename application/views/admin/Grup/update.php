<?php foreach ($grup as $key => $list) : ?>
    <div class="col-lg-6">
        <form action="<?= site_url('admin/grup/update') ?>" method="post" class="form-horizontal"
              enctype="multipart/form-data" role="form">
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
                        <!-- Text input-->
                        <input name="id" value="<?= $list['id_guest_group'] ?>" hidden/>
                        <div class="row form-group">
                            <label class="col-md-4 control-label" for="gcode">Kode Grup</label>
                            <div class="col-md-3">
                                <input id="gcode" maxlength="5" name="gcode" type="text"
                                       value="<?= $list['kode_grup'] ?>" placeholder="" class="form-control input-md">
                            </div>
                            <label class="col-md-5" style="margin-top:5pt;">*Maksimal 5 karakter</label>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-4 control-label" for="gname">Nama Grup</label>
                            <div class="col-md-8">
                                <input id="gname" maxlength="50" name="gname" type="text" value="<?= $list['nama'] ?>"
                                       placeholder="" class="form-control input-md" required="">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row form-group">
                            <label class="col-md-4 control-label" for="diskon">Diskon</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input id="diskon" maxlength="2" name="diskon" type="text"
                                           value="<?= $list['diskon'] ?>" placeholder="" class="form-control input-md"
                                           required="">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                    </fieldset>
                </div>
                <div class="panel-footer">
                    <a href="javascript:back()" class="btn btn-warning">Kembali</a>
                    <button id="Submit" name="Submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>
<script>
    function back() {
        $.ajax({
            type: "POST",
            url: "<?=site_url('admin/grup/')?>",
            data: "back=" + true,
            success: function (msg) {
                $("#div_result").html(msg);
            }
        });
    }
</script>
