<div class="row">
	<div class="col-md-7 col-lg-7">
		<div class="panel panel-warning">
			<!-- Default panel contents -->
			<div class="panel-heading"><h4><?=$title?></h4></div>
			<?php if($this->session->flashdata('operation') != NULL){ ?>
			<div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
				<p><?=$this->session->flashdata('message'); ?></p>
			</div>
			<?php } ?>
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Harga</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach($makanan as $list): ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$list['nama']?></td>
						<td>
							<?php
							if ($list['jenis_makanan']==0) {
								echo "<p class='text-muted'>Makanan</p>";
							} else {
								echo "<p class='text-muted'>Minuman</p>";
							}
							?>
						</td>
						<td><?php echo 'Rp. ' . number_format($list['harga'], '0' , '' , '.' ) . ',-'; ?></td>
						<td>
							<button class="btn btn-success btn-xs" onclick="updateData('<?=$list["id_food"]?>')">Update</button>
							<button class="btn btn-danger btn-xs btn-delete" onclick="confirmDeleteModal('<?=$list["id_food"]?>')">
							Hapus
							</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-5 col-lg-5">
		<div class="panel panel-warning">
			<div class="panel-heading"><h4>Tambah Data Makanan & minuman</h4></div>
			<div class="panel-body">
                    
                    <!-- alert -->
                    <?php if($this->session->flashdata('errors') != NULL){ ?>
                        <div class="alert alert-warning" role="alert">
                            <p><?=$this->session->flashdata('errors'); ?></p>
                        </div>
                    <?php } ?>
                    <!-- end of alert -->
                    
				<form action="<?=site_url('admin/makanan/create')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="foodname">Nama</label>
							<div class="col-md-8">
								<input id="foodname" name="foodname" type="text" placeholder="" class="form-control input-md" required="">
								
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="price">Harga</label>
							<div class="col-md-3">
								<input id="price" name="price" type="text" placeholder="" class="form-control input-md" required="">
								
							</div>
							<label class="col-md-5" style="margin-top:5pt;">*tanpa titik ataupun koma</label>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="jenis">Jenis</label>
							<div class="col-md-8">
								<select id="jenis" name="jenis" class="form-control">>
									<option value="0">Makanan</option>
									<option value="1">Minuman</option>
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
			$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Hapus Data Kamar</a>');
		}
		
		function deleteData(id){
		// do your stuffs with id
			window.location.assign("<?=site_url('admin/makanan/delete/')?>"+id)
		$('#deleteModal').modal('hide'); // now close modal
		}
		function updateData(id){
			window.location.assign("<?=site_url('admin/makanan/viewUpdate/')?>"+id)
		}
</script>

<div id="deleteModal" class="modal fade" role='dialog'>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Hapus Data Makanan / Minuman</h4>
			</div>
			<div class="modal-body">
				<p>Anda yakin akan menghapus data Makanan / Minuman ini ?</p>
				<p>Makanan / Minuman ini tidak akan tersedia lagi bagi tamu baru di masa datang. <br/>Namun, histori Makanan / Minuman ini akan tetap ada di setiap transaksi yang pernah tercatat</p>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<span id= 'deleteButton'></span>
			</div>
			
		</div>
	</div>
</div>