<div class="col-lg-12">
    <div class="panel panel-warning">
        <div class="panel-heading"><h4><?= $title ?></h4></div>
        <div class="row">
            <div class="panel-body">
                <div class="col-lg-5">
                    <!-- Text input-->
                    <form action="<?= site_url('admin/pembayaran/simpan_makanan') ?>" method="post"
                          class="form-horizontal" enctype="multipart/form-data" role="form">
                        <h4>Pesan Makanan / Minuman</h4>
                        <hr>
                        <input id="payment_id" maxlength="2" name="payment_id" value="<?= $payment_id ?>"
                               type="text" hidden/>
                        <div class="form-group row">
                            <label class="col-md-4 control-label" for="food">Nama</label>
                            <div class="col-md-8">
                                <select id="food" name="food" class="form-control">
                                    <option value="">--Pilih Makanan / Minuman--</option>
                                    <?php foreach ($foods as $food) { ?>
                                        <option value="<?= $food['id_food'] ?>"><?= $food['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label" for="jumlah">Jumlah</label>
                            <div class="col-md-3">
                                <input id="jumlah" maxlength="2" name="jumlah" type="text" class="form-control"
                                       required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label" for="Submit"></label>
                            <div class="col-md-5">
                                <button id="Submit" name="Submit" class="btn btn-success pull-right">Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7"><h4>Daftar Pesanan Sebelumnya</h4>
                    <hr>
                    <?php $total_bayar = 0; ?>
                    <?php if (count($daftar) > 0) { ?>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>PPn</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($daftar as $list) { ?>
                                <tr>
                                    <td><?= $list['nama'] ?></td>
                                    <td>
                                        <?php
                                        if ($list['jenis_makanan'] == 0) {
                                            echo "<p class='text-muted'>Makanan</p>";
                                        } else {
                                            echo "<p class='text-muted'>Minuman</p>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo 'Rp. ' . number_format($list['harga'], '0', '', '.') . ',-'; ?></td>
                                    <td><?= $list['jumlah'] ?></td>
                                    <td><?php echo 'Rp. ' . number_format($list['ppn'], '0', '', '.') . ',-'; ?></td>
                                    <td><?php echo 'Rp. ' . number_format($list['total'], '0', '', '.') . ',-'; ?></td>
                                </tr>
                                <?php $total_bayar += $list['total']; ?>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div style="margin-right:30px" class="pull-right">
                        <label><h4>Total Keselurahan : <?php echo 'Rp. ' . number_format($total_bayar, '0', '', '.') . ',-'; ?></h4></label>
                        </div>
                    <?php } else {
                        echo 'Data Kosong';
                    } ?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?= site_url('admin/pembayaran') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>

