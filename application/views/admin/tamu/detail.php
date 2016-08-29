<?php foreach ($detail as $list): ?>
    <div class="col-lg-8">
        <div class="panel panel-warning">
            <div class="panel-heading"><h4><?= $title ?></h4></div>
            <div class="panel-body">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="ktp">KTP / KTM / Passport</label>
                        <div class="col-md-8">
                            <label><?= $list['no_ktp'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="fname">Nama Depan</label>
                        <div class="col-md-8">
                            <label><?= $list['nama_depan'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="lname">Nama Belakang</label>
                        <div class="col-md-8">
                            <label><?= $list['nama_belakang'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="email">E-mail</label>
                        <div class="col-md-8">
                            <label><?= $list['email'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="phone">Telepon / HP</label>
                        <div class="col-md-8">
                            <label><?= $list['telepon'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="address">Alamat</label>
                        <div class="col-md-8">
                            <label><?= $list['alamat'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="country">Negara</label>
                        <div class="col-md-8">
                            <label><?= $list['country_name'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="province">Provinsi</label>
                        <div class="col-md-8">
                            <label><?= $list['provinsi'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="city">Kota / Kabupaten</label>
                        <div class="col-md-8">
                            <label><?= $list['kota'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="gcode">Kode Pos</label>
                        <div class="col-md-8">
                            <label><?= $list['zip'] ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="gcode">Grup Tamu</label>
                        <div class="col-md-8">
                            <label><?= $list['nama'] ?></label>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="panel-footer">
                <a href="javascript:back()" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    function back() {
        $.ajax({
            type: "POST",
            url: "<?=site_url('admin/tamu/')?>",
            data: "back=" + true,
            success: function (msg) {
                $("#div_result").html(msg);
            }
        });
    }
</script>
