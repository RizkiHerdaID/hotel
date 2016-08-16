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
							<th>Nama Jasa</th>
							<th>Harga</th>
							<th>Jenis</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($jasa as $list): ?>
						<tr <?php
									if ($list['jenis']==0)
										echo 'class="danger"';
										else
										echo 'class="success"';
							?>>
							<td><?=$no++?></td>
							<td><?=$list['nama']?></td>
							<td><?php echo 'Rp. ' . number_format($list['harga'], '0' , '' , '.' ) . ',-'; ?></td>
							<td><?php if ($list['jenis'] == 0) {
									echo 'Jasa Kamar';
								} else {
									echo 'Jasa Lainnya';
								}
							?></td>
							<td>
								<button class="btn btn-success btn-xs" onclick="updateData('<?=$list["id_service"]?>')">Update</button>
								<button class="btn btn-danger btn-xs btn-delete" onclick="confirmDeleteModal('<?=$list["id_service"]?>')">
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
				<div class="panel-heading"><h4>Tambah Jasa Lain-lainnya</h4></div>
				<div class="panel-body">
                    
                    <!-- alert -->
                    <?php if($this->session->flashdata('errors') != NULL){ ?>
                        <div class="alert alert-warning" role="alert">
                            <p><?=$this->session->flashdata('errors'); ?></p>
                        </div>
                    <?php } ?>
                    <!-- end of alert -->
                    
					<form action="<?=site_url('admin/jasa/create')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
						<fieldset>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="servicename">Nama</label>
								<div class="col-md-8">
									<input id="servicename" vaue="<?=set_value('servicename')?>" name="servicename" type="text" placeholder="" class="form-control input-md" required="">
									
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="price">Harga</label>
								<div class="col-md-3">
									<input id="price" vaue="<?=set_value('price')?>" name="price" type="text" placeholder="" class="form-control input-md" required="">
								</div>
								<label class="col-md-5" style="margin-top:5pt;">*tanpa titik ataupun koma</label>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="jenis">Jenis</label>
								<div class="col-md-8">
									<label style="margin-right:5pt"><input type="radio" name="jenis" value="0" checked="true"> Jasa Kamar</label>
									<label style="margin-right:5pt"><input type="radio" name="jenis" value="1"> Jasa Lainnya</label>
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
		$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Hapus Jasa</a>');
	}
	
	function deleteData(id){
	// do your stuffs with id
	window.location.assign("<?=site_url('admin/jasa/delete/')?>"+id)
	$('#deleteModal').modal('hide'); // now close modal
	}
	function updateData(id, group){
	window.location.assign("<?=site_url('admin/jasa/viewUpdate/')?>"+id)
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
					<h4 class="modal-title">Hapus Jasa </h4>
				</div>
				<div class="modal-body">
					<p>Anda yakin akan menghapus <strong> data jasa </strong> ini ?</p>
					<p>Jasa ini tidak akan ditemukan pada transaksi yang mungkin akan terjadi di masa yang akan datang. Namun, histori jasa ini akan tetap ada di setiap transaksi yang pernah tercatat</p>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<span id= 'deleteButton'></span>
				</div>
				
			</div>
		</div>
	</div>