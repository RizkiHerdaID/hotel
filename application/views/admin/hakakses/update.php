<div class="col-lg-8">
    <?= form_open('admin/hakAkses/update', 'class="form-horizontal" enctype="multipart/form-data" role="form"'); ?>
    <div class="panel panel-warning">
        <div class="panel-heading"><h4><?= $title ?></h4></div>
        <div class="panel-body">
            <!-- Alert Kesalahan / Kekurangan Input Data Update Pengguna -->
            <?php if ($this->session->flashdata('errors') != NULL) { ?>
                <div class="alert alert-warning" role="alert">
                    <p><?= $this->session->flashdata('errors'); ?></p>
                </div>
            <?php } ?>
            <!-- Akhir dari Alert -->
            <?php foreach ($detail as $list): ?>
                <fieldset>
                    <?=form_hidden('userid', $list['user_id']);?>
                    <!-- Input Username-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="username">Username</label>
                        <div class="col-md-8">
                            <input id="username" maxlength="30" name="username" type="text"
                                   value="<?= $list['username'] ?>" placeholder="" class="form-control input-md"
                                   required="" readonly>
                        </div>
                    </div>
                    <!-- Input Nama Depan-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fname">Nama Depan</label>
                        <div class="col-md-8">
                            <input id="fname" maxlength="50" name="fname" type="text"
                                   value="<?= $list['first_name'] ?>" placeholder="" class="form-control input-md"
                                   required="">
                        </div>
                    </div>
                    <!-- Input Nama Belakang -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="lname">Nama Belakang</label>
                        <div class="col-md-8">
                            <input id="lname" maxlength="50" name="lname" type="text"
                                   value="<?= $list['last_name'] ?>" placeholder="" class="form-control input-md"
                                   required="">
                        </div>
                    </div>
                    <!-- Input Alamat Email -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">E-mail</label>
                        <div class="col-md-8">
                            <input id="email" maxlength="100" name="email" type="text" value="<?= $list['email'] ?>"
                                   placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>
                    <!-- Input Nomor Telepon / HP-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">Telepon / HP</label>
                        <div class="col-md-8">
                            <input id="phone" maxlength="20" name="phone" type="text" value="<?= $list['phone'] ?>"
                                   placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>
                    <input id="level" maxlength="20" name="level" type="text" value="<?= $list['group_id'] ?>"
                           hidden/>
                </fieldset>
            <?php endforeach; ?>
        </div>
        <div class="panel-footer">
            <a href="javascript:back()" class="btn btn-warning">Kembali</a>
            <button id="Submit" name="Submit" class="btn btn-success pull-right">Update</button>
        </div>
    </div>
    </form>
</div>
<script>
    function back() {
        $.ajax({
            type: "POST",
            url: "<?=site_url('admin/hakAkses/')?>",
            data: "back=" + true,
            success: function (msg) {
                $("#div_result").html(msg);
            }
        });
    }
</script>
