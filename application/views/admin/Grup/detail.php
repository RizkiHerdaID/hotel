<?php foreach ($grup as $key => $list) : ?>
<!-- Text input-->
<div class="col-lg-8">
	<div class="panel panel-warning">
		<div class="panel-heading"><h4><?=$title?></h4></div>
		<div class="panel-body">
			<div class="form-group row">
				<label class="col-md-4 control-label" for="gcode">Kode Grup</label>
				<div class="col-md-3">
					<label><?=$list['kode']?></label>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-4 control-label" for="gname">Nama Grup</label>
				<div class="col-md-8">
					<label><?=$list['nama']?></label>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="diskon">Diskon</label>
				<div class="col-md-3">
					<div class="input-group">
						<label><?=$list['diskon']?>%</label>
					</div>
				</div>
			</div>
			<!-- Button -->
		</div>
		<div class="panel-footer">
			<a href="<?=site_url('admin/grup')?>" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>
<?php endforeach; ?>