<?php foreach($kamar as $list): ?>
<div class="col-lg-12">
	<div class="panel panel-warning">
		<div class="panel-heading"><h4><?=$title?></h4></div>
		<div class="row">
			<div class="panel-body">
				<div class="col-lg-4">
					<!-- Text input-->
					<h4>Data Kamar</h4>
					<hr>
					<div class="form-group row">
						<label class="col-md-4 control-label" for="no_room">Nomor Kamar	</label>
						<div class="col-md-8">
							<label for=""><?=$list['numbers']?></label>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="jenis">Jenis Kamar</label>
						<div class="col-md-8">
							<label for=""><?=$list['title']?></label>
						</div>
					</div>
					<!-- Button -->
				</div>
				<div class="col-lg-8">
					<h4>Data Tamu</h4>
					<hr>
					<div class="form-group row">
					<label class="col-md-4 control-label" for="ktp">Nomor KTP</label>
					<div class="col-md-8">
						<label><?=$list['no_ktp']?></label>
						
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 control-label" for="fname">Nama Depan</label>
					<div class="col-md-8">
						<label><?=$list['nama_depan']?></label>
						
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 control-label" for="lname">Nama Belakang</label>
					<div class="col-md-8">
						<label><?=$list['nama_belakang']?></label>
						
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 control-label" for="email">E-mail</label>
					<div class="col-md-8">
						<label><?=$list['email']?></label>
						
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="phone">Telepon / HP</label>
					<div class="col-md-8">
						<label><?=$list['telepon']?></label>
						
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="address">Alamat</label>
					<div class="col-md-8">
						<label><?=$list['alamat']?></label>
						
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="country">Negara</label>
					<div class="col-md-8">
						<label><?=$list['negara']?></label>
						
					</div>
				</div>
				<!-- Text
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="province">Provinsi</label>
					<div class="col-md-8">
						<label><?=$list['provinsi']?></label>
						
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="city">Kota / Kabupaten</label>
					<div class="col-md-8">
						<label><?=$list['kota']?></label>
						
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="gcode">Kode Pos</label>
					<div class="col-md-8">
						<label><?=$list['zip']?></label>
						
					</div>
				</div>
				<!-- Select Basic -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="gcode">Grup Tamu</label>
					<div class="col-md-8">
						<label><?=$list['nama']?></label>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<a href="<?=site_url('admin/kamar')?>" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>
<?php endforeach; ?>