<div class="row">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-warning">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h4>Data Kamar</h4></div>

	    <!-- Table -->
	  <table class="table">
	    <table class="table">
		  <thead>
	        <tr>
	        	<th>No</th>
	        	<th>No. Kamar</th>
	            <th>Kelas</th>
	            <th>Status</th>
	            <th>Action</th>
	        </tr>
	      </thead>
	       <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($kamar as $list): ?>

                        <tr 
                        <?php 
	                        if ($list['status']==1)
	                        	echo 'class="danger"';
	                        else	
	                        	echo 'class="success"';
                        ?>
                         >
                            <td><?=$no++?></td>
                            <td><?=$list['numbers']?></td>
                            <td><?=$list['title']?></td>
                            <td>
	                            <?php
	                            if ($list['status']==1) {
	                            	echo 'Terpakai';
	                            } else {
	                            	echo 'Tersedia';
	                            }
	                            ?>
                            </td>
                            <td>
                               <button class="btn btn-warning btn-xs">Detail</button>
                               <button class="btn btn-success btn-xs">Ganti</button>
                               <button type="button"
                               		<?php 
                               		if ($list['status'] == 1) {
                               			echo 'class="btn btn-muted btn-xs disabled"';
                               		} else {
                               			echo 'class="btn btn-danger btn-xs"';
                               		}
                               		
                               		?>
                               >
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
		  <div class="panel-heading"><h4>Tambah Kamar</h4></div>
		  <div class="panel-body">
		    <form class="form-horizontal">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="no_room">Nomor Kamar	</label>  
				  <div class="col-md-8">
				  <input id="no_room" name="no_room" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="room">Jenis Kamar</label>
				  <div class="col-md-8">
				    <select id="room" name="room" class="form-control">
				      <option value="1">Single Room</option>
				      <option value="2">Double Room</option>
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