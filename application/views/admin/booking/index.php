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
				<a type="button" href="<?=site_url('admin/booking/viewCreate')?>" class="btn btn-warning" style="margin-bottom:5pt;">+ Booking</a>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Kode Booking</th>
							<th>Nama Tamu</th>
							<th>Alamat</th>
							<th>Telepon / HP</th>
							<th>Jenis Kamar</th>
							<th>Tanggal Masuk</th>
							<th>Tanggal Keluar</th>
							<th>Action</th>
							<th>Check-in</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($booking as $list): ?>
						<tr>
							<td><?=$list['kode']?></td>
							<td><?=$list['nama_depan'].' '.$list['nama_belakang'] ?></td>
							<td><?=$list['kota'].' - '.$list['provinsi']?></td>
							<td><?=$list['telepon']?></td>
							<td><?=$list['title']?></td>
							<td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_in']))); ?></td>
							<td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_out']))); ?></td>
							<td>
								<a href="#" class="btn btn-xs btn-success">Update</a>
								<a href="#" class="btn btn-xs btn-danger">Hapus</a>
							</td>
							<td align="center"><a href="#" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-ok"></span></a></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>