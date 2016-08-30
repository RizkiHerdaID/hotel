<?php
$datestring = '%d/%m/%Y';
?>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title"><?=$title?></h4>
            </div>
            <div class="panel-body">
                <?php if($this->session->flashdata('operation') != NULL){ ?>
                    <div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
                        <p><?=$this->session->flashdata('message'); ?></p>
                    </div>
                <?php } ?>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Kode Order</th>
                        <th>Nama Tamu</th>
                        <th class="hidden-sm hidden-xs">Telepon / HP</th>
                        <th>Jenis Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                        <th>Diskon</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($approval as $list):
                        if($list['order_status'] == 0){ ?>
                        <tr>
                            <td><?=$list['kode']?></td>
                            <td><?=$list['nama_depan'].' '.$list['nama_belakang'] ?></td>
                            <td class="hidden-sm hidden-xs"><?=$list['telepon']?></td>
                            <td><?=$list['title']?></td>
                            <td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_in']))); ?></td>
                            <td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_out']))); ?></td>
                            <td>Pending</td>
                            <td><?=$list['diskon']?> %</td>
                            <td>
                                <a href="<?=site_url('admin/approval/approve/')?><?=$list['order_id']?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-log-out"></span> Approve</a>
                                <a href="<?=site_url('admin/approval/reject/')?><?=$list['order_id']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-log-out"></span> Reject</a>
                            </td>
                        </tr>
                    <?php } endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>