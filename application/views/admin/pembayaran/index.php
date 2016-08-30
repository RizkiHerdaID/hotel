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
							<th rowspan="2" style="vertical-align:middle">No Kwitansi</th>
							<th rowspan="2" style="vertical-align:middle">Kode Order</th>
							<th rowspan="2" style="vertical-align:middle">Nama</th>
							<th rowspan="2" style="vertical-align:middle; text-align: center;">Sewa Kamar<br/>/ Hari</th>
							<th rowspan="2" style="vertical-align:middle; text-align: center;">Jumlah <br/>Hari</th>
							<th rowspan="2" style="vertical-align:middle; text-align: center;">Sewa <br/>Setelah Diskon</th>
							<th colspan="2">Additional</th>
							<th rowspan="2" style="vertical-align:middle">PPN 10%</th>
							<th rowspan="2" style="vertical-align:middle; text-align: center;">Total<br/> Bayar</th>
							<th rowspan="2" style="vertical-align:middle; text-align: center;">Tanggal<br/> Bayar</th>
							<th rowspan="2" style="vertical-align:middle">Aksi</th>
						</tr>
						<tr>
							<th>F&B</th>
							<th>Jasa</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($payment as $list): ?>
						<?php if($list['order_status'] >= 2){ ?>
						<tr>
							<td><?=$list['kwitansi']?></td>
							<td><?=$list['kode']?></td>
							<td><?=$list['nama_depan'].' '.$list['nama_belakang']?></td>
							<td style="vertical-align:middle; text-align: center;"><?php echo 'Rp. ' . number_format($list['price'], '0' , '' , '.' ) . ',-'; ?></td>
							<td style="text-align: center;"><?php if($list['order_status']>2){ echo $list['day'].' hari'; }?></td>
							<td><?php if($list['order_status']>2){ echo 'Rp. ' . number_format($list['payment_room'], '0' , '' , '.' ) . ',-'; }?></td>
							<td><a href="<?=site_url('admin/pembayaran/foods/');?><?=$list['payment_id']?>" class="btn btn-xs btn-warning" <?php if($list['order_status'] < 2) echo 'disabled'; ?>><span class="glyphicon glyphicon-shopping-cart"></span></a></td>
							<td><a href="<?=site_url('admin/pembayaran/services/');?><?=$list['payment_id']?>" class="btn btn-xs btn-success" <?php if($list['order_status'] < 2) echo 'disabled'; ?>><span class="glyphicon glyphicon-list-alt"></span></a></td>
							<td><?php if($list['order_status']>2){ echo 'Rp. ' . number_format($list['ppn'], '0' , '' , '.' ) . ',-'; }?></td>
							<td><?php if($list['order_status']>2){ echo 'Rp. ' . number_format($list['payment_total'], '0' , '' , '.' ) . ',-'; }?></td>
							<td style="vertical-align:middle; text-align: center;"><?php  if($list['order_status'] > 3){echo date('d M Y', strtotime(str_replace('-','/', $list['payment_date'])));} ?></td>
							<?php switch($list['order_status']){
								case "3":?>
									<td align="center"><button onclick='confirmBayarModal("<?=$list['order_id']?>")' class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-usd"></span> Bayar</button></td>
								<?php break; ?>
								<?php case "4":?>
									<td align="center"><a target="_blank" href="<?=site_url('admin/pembayaran/payment')?>/TRUE/<?=$list['payment_id']?>/<?=$list['kwitansi']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-print"></span> Cetak</a></td>
										 <?php break; default: echo '<td></td>'?>
							<?php }?>
						</tr>
					<?php } endforeach; ?>
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

