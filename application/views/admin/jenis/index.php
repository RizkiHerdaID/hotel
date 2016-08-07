<div class="row">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-warning">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h4>Data Jenis Kamar</h4></div>
	<!-- Table -->
	  <table class="table">
	    <table class="table">
		  <thead>
	        <tr>
	        	<th>No</th>
	        	<th>No. Jenis</th>
	            <th>Jenis Kamar</th>
	            <th>Harga</th>
	            <th>Action</th>
	        </tr>
	      </thead>
	       <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($jenis as $list): ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$list['no_jenis']?></td>
                            <td><?=$list['title']?></td>
                            <td><?=$list['price']?></td>
                            <td>
                               <button class="btn btn-warning btn-xs">Detail</button>
                               <button class="btn btn-success btn-xs">Ganti</button>
                               <button class="btn btn-danger btn-xs">Hapus</button>
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
		    <form class="form-horizontal">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="username">Nomor Jenis</label>  
				  <div class="col-md-8">	
				  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="username">Jenis Kamar</label>  
				  <div class="col-md-8">
				  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="name">Harga Kamar</label>  
				  <div class="col-md-8">
				  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="level">Tahun Jenis</label>
				  <div class="col-md-8">
				    <select id="level" name="level" class="form-control">
				      <option value="1">2016</option>
				      <option value="2">2015</option>
				    </select>
				  </div>
				</div>

				<!-- Multiple Checkboxes (inline) -->
				<div class="form-group" style='margin-left: 5pt'>
				  <label class="col-md-4 control-label" for="checkboxes">Fasilitas</label>
				  <div class="col-md-8">
				    <label class="checkbox-inline" for="checkboxes-0">
				      <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
				      AC
				    </label>
				    <label class="checkbox-inline" for="checkboxes-1">
				      <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
				      TV
				    </label>
				    <label class="checkbox-inline" for="checkboxes-2">
				      <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
				      Hot Water
				    </label>
				    <label class="checkbox-inline" for="checkboxes-2">
				      <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
				      Kulkas
				    </label>
				  </div>
				</div>

				<!-- Foto --> 
				<div class="form-group" style='margin-left: 2pt'>
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