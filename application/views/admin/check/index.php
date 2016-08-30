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
				<a type="button" href="<?=site_url('admin/check/viewCreate')?>" class="btn btn-success" style="margin:5pt 10pt;">
					<span class="glyphicon glyphicon-plus"></span> Check-in
				</a>
				<table class="table table-hover">
					<thead>
					<tr>
						<th>Kode Order</th>
						<th>Nama Tamu</th>
						<th>Jenis Kamar</th>
						<th>Nomor Kamar</th>
						<th>Tanggal Masuk</th>
						<th>Tanggal Keluar</th>
						<th>Status</th>
						<th>Update/Hapus</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<!--TODO Tambahkan Fitur Detail Check-in -->
					<tbody>
					<?php foreach($check as $list): ?>
						<tr <?php
						switch ($list['order_status']){
							case "1":
								echo 'class="warning"';
								break;
							case "2":
								echo 'class="success"';
								break;
							case "3":
								echo 'class="danger"';
								break;

						}
						?>>
							<td><?=$list['kode']?></td>
							<td><?=$list['nama_depan'].' '.$list['nama_belakang'] ?></td>
							<td><?=$list['title']?></td>
							<td><?=$list['numbers']?></td>
							<td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_in']))); ?></td>
							<td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_out']))); ?></td>
							<td><?php
								switch ($list['order_status']) {
									case "0":
										echo 'Pending';
										break;
									case "1":
										echo 'Approved';
										break;
									case "-1":
										echo 'Rejected';
										break;
									case "2":
										echo 'Check-in';
										break;
									case "3":
										echo 'Belum Bayar';
										break;
									case "4":
										echo 'Pulang';
								}
								?>
							</td>
							<td>
								<a href="#" class="btn btn-xs btn-warning">Update</a>
								<?php if($list['order_status'] < 2) { ?><a href="#" class="btn btn-xs btn-danger" onclick='confirmDeleteModal("<?=$list['order_id']?>")'>Hapus</a> <?php } ?>
							</td>
							<?php switch ($list['order_status']){
									case "1": ?>
									<td align="center"><a href="<?=site_url('admin/check/checkIn/')?><?=$list['order_id']?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-log-out"></span> Check-in</a></td>
									<?php break; ?>
										
									<?php case "2": ?>
									<td align="center"><a href="<?=site_url('admin/check/checkOut/')?><?=$list['order_id']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-log-out"></span> Check-out</a></td>
									<?php break; ?>

									<?php case "3": ?>
									<td align="center"><button onclick='confirmBayarModal("<?=$list['payment_id']?>")' class="btn btn-xs btn-primary"> <span class="glyphicon glyphicon-usd"></span> Bayar</button></td>
									<?php break; ?>

									<?php case "4": ?>
									<td align="center"><a target="_blank" href="<?=site_url('admin/pembayaran/payment')?>/TRUE/<?=$list['payment_id']?>/<?=$list['kwitansi']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-print"></span> Cetak</a></td>
									<?php break; ?>

									<?php case "-1": ?>
										<td align="center"><small>Data Ditolak</small></td>
									<?php break; ?>

							<?php default: echo '<td><small>Menunggu Approval</small></td>'; } ?>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function confirmBayarModal(id){
		$.ajax({
				type : "GET",
				url  : "<?=site_url('admin/pembayaran/payment?payment_id=')?>"+id,
				success: function(data){
					$("#sewaKamar").html(data);
				}
		});
		$('#bayarModal').modal();
		$('#bayarButton').html('<a class="btn btn-primary" onclick="bayarData('+id+')">Bayar</a>');
	}

	function bayarData(id){
		// do your stuffs with id
		window.location.assign("<?=site_url('admin/pembayaran/bayar/')?>"+id)
		$('#bayarModal').modal('hide'); // now close modal
	}

	function confirmDeleteModal(id){
		$("#deleteModal").modal();
		$("#deleteButton").html('<a class="btn btn-danger" onclick="deleteData('+id+')">Hapus Data</a>');
	}

	function deleteData(id){
		// do your stuffs with id
		window.location.assign("<?=site_url('admin/pembayaran/delete/')?>"+id)
		$('#deleteModal').modal('hide'); // now close modal
	}

</script>
<div id="bayarModal" class="modal fade" role='dialog'>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Pembayaran</h4>
			</div>
			<div class="modal-body">
				<span id='sewaKamar'></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<span id= 'bayarButton'></span>
			</div>

		</div>
	</div>
</div>

<div id="deleteModal" class="modal fade" role='dialog'>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Hapus Data Check-in</h4>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin manghapus Data ini</p>
				<p>Data ini akan dihapus dari daftar Check-in. Namun data Tamu masih akan tersimpan di sistem.</p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<span id= 'deleteButton'></span>
			</div>

		</div>
	</div>
</div>