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
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach($hakakses as $list): ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$list['username']?></td>
						<td><?=$list['email']?></td>
						<td><?=$list['description']?></td>
						<td>
							<button class="btn btn-warning btn-xs" onclick="detailUser('<?=$list["user_id"]?>', '<?=$list["group_id"]?>')">Detail</button>
							<button class="btn btn-success btn-xs" onclick="updateUser('<?=$list["user_id"]?>', '<?=$list["group_id"]?>')">Update</button>
							<button class="btn btn-danger btn-xs btn-delete" onclick="confirmDeleteModal('<?=$list["user_id"]?>')">
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
			<div class="panel-heading"><h4>Tambah Pengguna Admin</h4></div>
			<div class="panel-body">
                    
                    <!-- alert -->
                    <?php if($this->session->flashdata('errors') != NULL){ ?>
                        <div class="alert alert-warning" role="alert">
                            <p><?=$this->session->flashdata('errors'); ?></p>
                        </div>
                    <?php } ?>
                    <!-- end of alert -->
                    
				<!-- Alert -->
				<?php if(isset($operation)){ ?>
				<div class="alert alert-<?=$operation?>" role="alert">
					<p><?php echo $message; ?></p>
				</div>
				<?php } ?>
				<!-- end of alert -->
				<form action="<?=site_url('admin/hakAkses/create')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
					<fieldset>
						<input id="userid" maxlength="30" name="userid" type="text" value="<?= set_value('user_id') ?>" hidden/>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="username">Username</label>
							<div class="col-md-8">
								<input id="username" maxlength="30" name="username" type="text" value="<?= set_value('username') ?>" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="password">Password</label>
							<div class="col-md-8">
								<input id="password" maxlength="30" name="password" type="password" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="passconf">Konfirmasi Password</label>
							<div class="col-md-8">
								<input id="passconf" maxlength="30" name="passconf" type="password" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="fname">Nama Depan</label>
							<div class="col-md-8">
								<input id="fname" maxlength="50" name="fname" type="text" value="<?= set_value('fname') ?>" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="lname">Nama Belakang</label>
							<div class="col-md-8">
								<input id="lname" maxlength="50" name="lname" type="text" value="<?= set_value('lname') ?>" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="email">E-mail</label>
							<div class="col-md-8">
								<input id="email" maxlength="100" name="email" type="text" value="<?= set_value('email') ?>" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="phone">Telepon / HP</label>
							<div class="col-md-8">
								<input id="phone" maxlength="20" name="phone" type="text" value="<?= set_value('phone') ?>" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="level">Level</label>
							<div class="col-md-8">
								<select id="level" name="level" class="form-control">
									<option value="">--Pilih Salah Satu--</option>
									<?php foreach($grup as $list): ?>
									<option value="<?=$list['id']?>"><?=$list['description']?></option>
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
		$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Hapus Pengguna</a>');
	}
	
	function deleteData(id){
	// do your stuffs with id
		window.location.assign("<?=site_url('admin/hakAkses/delete/')?>"+id)
		$('#deleteModal').modal('hide'); // now close modal
	}

	function detailUser(id, group){
		window.location.assign("<?=site_url('admin/hakAkses/details/')?>"+id+"/"+group)
	}

	function updateUser(id, group){
		window.location.assign("<?=site_url('admin/hakAkses/viewUpdate/')?>"+id+"/"+group)
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
				<p>Anda yakin akan menghapus pengguna ini ?</p>
				<p>Pengguna tidak akan bisa mangakses kembali halaman admin. <br/>Namun, histori pengguna akan tetap ada di setiap transaksi yang pernah tercatat</p>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<span id= 'deleteButton'></span>
			</div>
			
		</div>
	</div>
</div>