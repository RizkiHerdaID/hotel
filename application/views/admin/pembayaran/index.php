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
							<th rowspan="2" style="vertical-align:middle">Nama</th>
							<th rowspan="2" style="vertical-align:middle">Jenis Kamar</th>
							<th rowspan="2" style="vertical-align:middle">Kamar</th>
							<th rowspan="2" style="vertical-align:middle">Check-in</th>
							<th rowspan="2" style="vertical-align:middle">Check-out</th>
							<th rowspan="2" style="vertical-align:middle">Hari</th>
							<th rowspan="2" style="vertical-align:middle">Sewa Kamar</th>
							<th rowspan="2" style="vertical-align:middle">Diskon	</th>
							<th colspan="2">Additional</th>
							<th rowspan="2" style="vertical-align:middle">PPN 10%</th>
							<th rowspan="2" style="vertical-align:middle">Tgl Bayar</th>
							<th rowspan="2" style="vertical-align:middle">Total Bayar</th>	
							<th rowspan="2" style="vertical-align:middle">Hapus</th>	
							<th rowspan="2" style="vertical-align:middle">Cetak</th>	
						</tr>
						<tr>
							<th>F&B</th>
							<th>Jasa</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($bayar as $list): ?>
						<?php if($list['order_status'] >= 2){ ?>
						<tr>
							<td><?=$list['kwitansi']?></td>
							<td><?=$list['nama_depan'].' '.$list['nama_belakang']?></td>
							<td><?=$list['title']?></td>
							<td><?=$list['numbers']?></td>
							<td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_in']))); ?></td>
							<td align="center"><?php echo date('d M Y', strtotime(str_replace('-','/', $list['check_out']))); ?></td>
							<td></td>
							<td><?php echo 'Rp. ' . number_format($list['price'], '0' , '' , '.' ) . ',-'; ?></td>
							<td><?=$list['diskon']?> %</td>
							<td><button href="" class="btn btn-xs btn-warning" <?php if($list['order_status'] < 2) echo 'disabled'; ?>><span class="glyphicon glyphicon-shopping-cart"></span></button></td>
							<td><button href="" class="btn btn-xs btn-success" <?php if($list['order_status'] < 2) echo 'disabled'; ?>><span class="glyphicon glyphicon-list-alt"></span></button></td>
							<td></td>
							<td></td>
							<td></td>
							<td><a href="" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
							<td><a href="" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-print"></span></a></td>
						</tr>
					<?php } endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

