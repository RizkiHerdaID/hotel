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
								<button class="btn btn-danger btn-xs btn-delete" onclick="confirmDeleteModal('<?=$list["booking_id"]?>')">
								Hapus
								</button>
							</td>
							<td align="center"><a href="#" class="btn btn-xs btn-warning" onclick="checkIn('<?=$list["id"]?>')"><span class="glyphicon glyphicon-ok"></span></a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function confirmDeleteModal(id){
	$('#deleteModal').modal();
		$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Hapus Data Booking</a>');
	}
	
	function deleteData(id){
	// do your stuffs with id
	window.location.assign("<?=site_url('admin/booking/delete/')?>"+id)
	$('#deleteModal').modal('hide'); // now close modal
	}

	function checkIn(ktp){
		// do your stuffs with id
		window.location.assign("<?=site_url('admin/check/viewCreate/')?>"+ktp+"/true")
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
				<p>Anda yakin akan menghapus <strong> data booking </strong> ini ?</p>
				<p>Jika yakin silahkan klik tombol Hapus Booking</p>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<span id= 'deleteButton'></span>
			</div>
			
		</div>
	</div>
</div>