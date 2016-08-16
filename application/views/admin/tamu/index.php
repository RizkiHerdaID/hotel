<div class="row">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-warning">
			<!-- Default panel contents -->
			<div class="panel-heading"><h4><?=$title?></h4></div>
			<!-- alert -->
			<?php if($this->session->flashdata('operation') != NULL){ ?>
			<div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
				<p><?=$this->session->flashdata('message'); ?></p>
			</div>
			<?php } ?>
			<!-- end of alert -->
			<!-- Table -->
			<table class="table">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>No. KTP</th>
							<th>Nama Lengkap</th>
							<th>Grup Tamu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($tamu as $list): ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$list['no_ktp']?></td>
							<td><?=$list['nama_depan']?> <?=$list['nama_belakang']?> </td>
							<td><?=$list['nama']?></td>
							<td>
								<button class="btn btn-warning btn-xs" onclick="detailData('<?=$list["id"]?>')">Detail</button>
								<button class="btn btn-success btn-xs" onclick="updateData('<?=$list["id"]?>')">Update</button>
								<button class="btn btn-danger btn-xs btn-delete" onclick="confirmDeleteModal('<?=$list["id"]?>')">
								Hapus
								</button>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<div class="panel panel-warning">
				<div class="panel-heading"><h4>Tambah Data Tamu</h4></div>
				<div class="panel-body">
                    
                    <!-- alert -->
                    <?php if($this->session->flashdata('errors') != NULL){ ?>
                        <div class="alert alert-warning" role="alert">
                            <p><?=$this->session->flashdata('errors'); ?></p>
                        </div>
                    <?php } ?>
                    <!-- end of alert -->
                    
					<form action="<?=site_url('admin/tamu/create')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
						<fieldset>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="ktp">Nomor KTP</label>
								<div class="col-md-8">
									<input id="ktp" name="ktp" type="text" value="<?=set_value('ktp')?>" placeholder="" class="form-control input-md" required="">
									
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
	</div>

<script type="text/javascript">
	function confirmDeleteModal(id){
	$('#deleteModal').modal();
		$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Hapus Tamu</a>');
	}
	
	function deleteData(id){
	// do your stuffs with id
		window.location.assign("<?=site_url('admin/tamu/delete/')?>"+id)
		$('#deleteModal').modal('hide'); // now close modal
	}

	function detailData(id, group){
		window.location.assign("<?=site_url('admin/tamu/details/')?>"+id)
	}

	function updateData(id, group){
		window.location.assign("<?=site_url('admin/tamu/viewUpdate/')?>"+id)
	}
</script>

<style type="text/css" media="screen">
	.labelDetail {
	margin-top: 5pt;
	}
	.detailPanel {
	margin-left: 10px;
	}
</style>
<div id="deleteModal" class="modal fade" role='dialog'>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Hapus Pengguna </h4>
			</div>
			<div class="modal-body">
				<p>Anda yakin akan menghapus tamu ini ?</p>
				<p>Tamu ini tidak akan ditemukan pada transaksi yang mungkin akan terjadi di masa yang akan datang. Namun, histori tamu ini akan tetap ada di setiap transaksi yang pernah tercatat</p>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<span id= 'deleteButton'></span>
			</div>
			
		</div>
	</div>
</div>