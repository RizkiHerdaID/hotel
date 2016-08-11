<?php foreach($makanan as $list): ?>
<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
	<div class="panel panel-warning">
		<div class="panel-heading"><h4><?=$title?></h4></div>
		<div class="panel-body">
			<form action="<?=site_url('admin/makanan/update')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
				<fieldset>
				<input id="foodname" value="<?=$list['id_food']?>" name="id" hidden />
					<div class="form-group">
						<label class="col-md-4 control-label" for="foodname">Nama</label>
						<div class="col-md-8">
							<input id="foodname" value="<?=$list['nama']?>" name="foodname" type="text" placeholder="" class="form-control input-md" required="">
							
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="price">Harga</label>
						<div class="col-md-8">
							<input id="price" value="<?=$list['harga']?>" name="price" type="text" placeholder="" class="form-control input-md" required="">
							
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-4 control-label" for="jenis">Jenis</label>
							<div class="col-md-8">
								<select id="jenis" name="jenis" class="form-control">>
									<option value="0" <?php if($list['jenis_makanan'] == 0) { echo ' selected'; } ?> >Makanan</option>
									<option value="1" <?php if($list['jenis_makanan'] == 1) { echo ' selected'; } ?> >Minuman</option>
								</select>
							</div>
						</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="Submit"></label>
						<div class="col-md-4">
							<button id="Submit" name="Submit" class="btn btn-warning">Simpan</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>