<div class="row">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-warning">
			<!-- Default panel contents -->
			<div class="panel-heading"><h4><?=$title?></h4></div>
			<?php if($this->session->flashdata('operation') != NULL){ ?>
			<div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
				<p><?=$this->session->flashdata('message'); ?></p>
			</div>
			<?php } ?>
			<!-- Table -->
			<table class="table">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>No. Jenis</th>
							<th>Kode Kamar</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($jenis as $list): ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$list['kode_jenis']?></td>
							<td><?=$list['title']?></td>
							<td><?php echo 'Rp. ' . number_format($list['price'], '0' , '' , '.' ) . ',-'; ?></td>
							<td>
								<button class="btn btn-warning btn-xs" onclick="detailData('<?=$list["idclass"]?>')">Detail</button>
								<button class="btn btn-success btn-xs" onclick="updateData('<?=$list["idclass"]?>')">Update</button>
								<button class="btn btn-danger btn-xs btn-delete" onclick="confirmDeleteModal('<?=$list["idclass"]?>')">
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
				<div class="panel-heading"><h4>Tambah Jenis Kamar</h4></div>
				<div class="panel-body">
					<form action="<?=site_url('admin/jenis/create')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
						<fieldset>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="kode">Kode Jenis</label>
								<div class="col-md-3">
									<input id="kode" maxlength="6" name="kode" type="text" placeholder="" value="<?=set_value('kode')?>" class="form-control input-md" required="">
								</div>
								<label class="col-md-5" style="margin-top:5pt;">*maksimal 6 karakter</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="jenis">Nama Jenis Kamar</label>
								<div class="col-md-8">
									<input id="jenis" maxlength="40" name="jenis" type="text" placeholder="" value="<?=set_value('jenis')?>" class="form-control input-md" required="">
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="harga">Harga Kamar</label>
								<div class="col-md-3">
									<input id="harga" maxlength="20" name="harga" type="text" placeholder="" value="<?=set_value('harga')?>" class="form-control input-md" required="">
								</div>
								<label class="col-md-5" style="margin-top:5pt;">*tanpa titik ataupun koma</label>
							</div>
							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="tahun">Tahun Jenis</label>
								<div class="col-md-8">
									<select id="tahun" name="tahun" class="form-control">
										<?php for($i=$tahun; $i>=2000 ; $i--){ ?>
										<option value="<?=$i?>"><?=$i?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- Multiple Checkboxes (inline) -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="facilities">Fasilitas</label>
								<div class="col-md-8">
									<?php $i=1; foreach($facilities as $list): if($i>3) echo '<br/>';?>
									<label class="checkbox-inline" for="facilities-<?=$i?>" style="margin-right:1pt;">
										<input type="checkbox" name="facilities[]" id="facilities-<?=$i++?>" value="<?=$list['nama']?>">
										<?=$list['nama']?>
									</label>
									<?php endforeach; ?>
								</div>
							</div>
							<!-- Foto -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="photo">Foto Kamar</label>
								<div class="col-md-8">
									<input id="photo" name="photo" class="input-file" type="file">
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
	window.location.assign("<?=site_url('admin/jenis/delete/')?>"+id)
	$('#deleteModal').modal('hide'); // now close modal
	}
	function detailData(id, group){
	window.location.assign("<?=site_url('admin/jenis/details/')?>"+id)
	}
	function updateData(id, group){
	window.location.assign("<?=site_url('admin/jenis/viewUpdate/')?>"+id)
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
					<p>Anda yakin akan menghapus <strong> jenis kamar</strong> ini ?</p>
					<p>Jenis ini tidak akan ditemukan pada transaksi yang mungkin akan terjadi di masa yang akan datang. Namun, histori tamu ini akan tetap ada di setiap transaksi yang pernah tercatat</p>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<span id= 'deleteButton'></span>
				</div>
				
			</div>
		</div>
	</div>