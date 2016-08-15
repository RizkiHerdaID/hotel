<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h4 class="panel-title"><?=$title?></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="<?=site_url('admin/check/create')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
						<div class=" col-md-6 col-lg-6">
							<h4>Data Tamu</h4>
							<hr>
							<h6>Cari Tamu Jika Tamu Pernah Check-in</h6>
							<?php if(isset($tamu)){ ?>
							<?php foreach($tamu as $list): ?>
							<fieldset>
								<!-- Text input-->
								<input id="id" name="id" type="text" value="<?=$list['id']?>" required="" hidden />
								<div class="form-group">
									<label class="col-md-4 control-label" for="ktp">Nomor KTP</label>
									<div class="col-md-5">
										<input id="ktp" name="ktp" type="text" value="<?=$list['no_ktp']?>" placeholder="" class="form-control input-md" required="" disabled />
									</div>
									<div class="col-md-3">
										<a href="<?=site_url('admin/check/cariTamu')?>" class="btn btn-primary">Cari Tamu</a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="fname">Nama Depan</label>
									<div class="col-md-8">
										<input id="fname" name="fname" type="text" value="<?=$list['nama_depan']?>" placeholder="" class="form-control input-md" required="" disabled />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="lname">Nama Belakang</label>
									<div class="col-md-8">
										<input id="lname" name="lname" type="text" value="<?=$list['nama_belakang']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">E-mail</label>
									<div class="col-md-8">
										<input id="email" name="email" type="text" value="<?=$list['email']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="phone">Telepon / HP</label>
									<div class="col-md-8">
										<input id="phone" name="phone" type="text" value="<?=$list['telepon']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="country">Negara</label>
									<div class="col-md-8">
										<input id="country" name="country" type="text" value="<?=$list['negara']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="address">Alamat</label>
									<div class="col-md-8">
										<input id="address" name="address" type="text" value="<?=$list['alamat']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="province">Provinsi</label>
									<div class="col-md-8">
										<input id="province" name="province" type="text" value="<?=$list['provinsi']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="city">Kota / Kabupaten</label>
									<div class="col-md-8">
										<input id="city" name="city" type="text" value="<?=$list['kota']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="zipcode">Kode Pos</label>
									<div class="col-md-8">
										<input id="zipcode" name="zipcode" type="text" value="<?=$list['zip']?>" placeholder="" class="form-control input-md" required="" disabled />
										
									</div>
								</div>
								<!-- Select Basic -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="gcode">Grup Tamu</label>
									<div class="col-md-8">
										<input id="gcode" name="gcode" type="text" value="<?=$list['nama']?>" placeholder="" class="form-control input-md" required="" disabled />
									</div>
								</div>
								<!-- Button -->
							</fieldset>
							<?php endforeach; ?>
							<?php } else {?>
							<fieldset>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="ktp">Nomor KTP</label>
									<div class="col-md-5">
										<input id="ktp" name="ktp" type="text" value="<?=set_value('ktp')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
									<div class="col-md-3">
										<a href="<?=site_url('admin/check/cariTamu')?>" class="btn btn-primary">Cari Tamu</a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="fname">Nama Depan</label>
									<div class="col-md-8">
										<input id="fname" name="fname" type="text" value="<?=set_value('fname')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="lname">Nama Belakang</label>
									<div class="col-md-8">
										<input id="lname" name="lname" type="text" value="<?=set_value('lname')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">E-mail</label>
									<div class="col-md-8">
										<input id="email" name="email" type="text" value="<?=set_value('email')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="phone">Telepon / HP</label>
									<div class="col-md-8">
										<input id="phone" name="phone" type="text" value="<?=set_value('phone')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="country">Negara</label>
									<div class="col-md-8">
										<input id="country" name="country" type="text" value="<?=set_value('country')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="address">Alamat</label>
									<div class="col-md-8">
										<input id="address" name="address" type="text" value="<?=set_value('address')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="province">Provinsi</label>
									<div class="col-md-8">
										<input id="province" name="province" type="text" value="<?=set_value('province')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="city">Kota / Kabupaten</label>
									<div class="col-md-8">
										<input id="city" name="city" type="text" value="<?=set_value('city')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="zipcode">Kode Pos</label>
									<div class="col-md-8">
										<input id="zipcode" name="zipcode" type="text" value="<?=set_value('zipcode')?>" placeholder="" class="form-control input-md" required="">
										
									</div>
								</div>
								<!-- Select Basic -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="gcode">Grup Tamu</label>
									<div class="col-md-8">
										<select id="gcode" name="gcode" class="form-control">
											<?php foreach($grup as $list): ?>
											<option value="<?=$list['id_guest_group']?>"><?=$list['nama']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</fieldset>
							<?php } ?>
						</div>
						<div class=" col-md-6 col-lg-6">
							<h4>Data Kamar</h4>
							<hr>
							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="jenis">Jenis Kamar</label>
								<div class="col-md-8">
									<select id="jenis" name="jenis" class="form-control">
										<option value="">--Pilih--</option>
										<?php foreach($jenis as $list): ?>
										<?php if($this->session->flashdata('jenis') != NULL){
											$tmp = $this->session->flashdata('jenis');
										if ($list['idclass'] == $tmp) { ?>
										<option value="<?=$list['idclass']?>" selected><?=$list['title']?></option>
										<?php } else {?>
										<option value="<?=$list['idclass']?>"><?=$list['title']?></option>
										<?php }
										} else { ?>
										<option value="<?=$list['idclass']?>"><?=$list['title']?></option>
										<?php } endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="kamar">Nomor Kamar</label>
								<div class="col-md-8">
									<select id="kamar" name="kamar" class="form-control">
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="check-in">Check-in</label>
								<div class="col-md-8">
									<input type="date" name="check-in" id="check-in" class="form-control" value="<?php echo date('d/m/Y'); ?>" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="check-out">Check-out</label>
								<div class="col-md-8">
									<input type="date" name="check-out" id="check-out" class="form-control" value="<?php echo date('d/m/Y'); ?>" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="Submit"></label>
								<div class="col-md-4">
									<button id="Submit" name="Submit" class="btn btn-warning">Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#jenis").change(function(){
			var idclass = $("$jenis").val();
			$.ajax({
				type : "GET",
				url  : "<?=site_url('admin/check/get_room?idclass=')?>"+idclass,
				success: function(data){
					$("#kamar").html(data);
				}
			});
		});
	});
</script>