<?php foreach($jenis as $list): ?>
<?php
	$tmp = $list['fasilitas'];
	$fasilitas = explode(",", $tmp);
?>
<div class="col-lg-6">
	<div class="panel panel-warning">
		<div class="panel-heading"><h4><?=$title?></h4></div>
		<div class="panel-body">
			<form class="form-horizontal">
				<fieldset>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="no">Kode Jenis</label>
						<div class="col-md-8">
							<label><?=$list['kode_jenis']?></label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="jenis">Nama Jenis Kamar</label>
						<div class="col-md-8">
							<label><?=$list['title']?></label>
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="harga">Harga Kamar</label>
						<div class="col-md-8">
							<label><?=$list['price']?></label>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="tahun">Tahun Jenis</label>
						<div class="col-md-8">
							<label><?=$list['tahun']?></label>
						</div>
					</div>
					<!-- Multiple Checkboxes (inline) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="checkboxes">Fasilitas</label>
						<div class="col-md-8">
							<?php foreach ($fasilitas as $var) {
								echo "- $var <br/>";
							} ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="panel-footer">
			<a href="<?=site_url('admin/jenis')?>" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>
<?php endforeach; ?>