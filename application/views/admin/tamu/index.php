<div class="row">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-warning">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h4>Daftar Tamu</h4></div>
    	<!-- Table -->
	  <table class="table">
	    <table class="table">
		  <thead>
	        <tr>
	        	<th>No</th>
	        	<th>No. KTP</th>
	            <th>Nama</th>
	            <th>Telepon / HP</th>
	            <th>Action</th>
	        </tr>
	      </thead>
	       <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($tamu as $list): ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$list['no_ktp']?></td>
                            <td><?=$list['nama_depan']?></td>
                            <td><?=$list['telepon']?></td>
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
		  <div class="panel-heading"><h4>Tambah Data Tamu</h4></div>
		  <div class="panel-body">
		    <form class="form-horizontal">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="ktp">Nomor KTP</label>  
				  <div class="col-md-8">	
				  <input id="ktp" name="ktp" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="fname">Nama Depan</label>  
				  <div class="col-md-8">
				  <input id="fname" name="fname" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>


				<div class="form-group">
				  <label class="col-md-4 control-label" for="lname">Nama Belakang</label>  
				  <div class="col-md-8">
				  <input id="lname" name="lname" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="email">E-mail</label>  
				  <div class="col-md-8">
				  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="phone">Telepon / HP</label>  
				  <div class="col-md-8">
				  <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="address">Alamat</label>  
				  <div class="col-md-8">
				  <input id="address" name="address" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="city">Kota</label>  
				  <div class="col-md-8">
				  <input id="city" name="city" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="province">Provinsi</label>  
				  <div class="col-md-8">
				  <input id="province" name="province" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="zipcode">Zip</label>  
				  <div class="col-md-8">
				  <input id="zipcode" name="zipcode" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="gcode">Kode Grup</label>
				  <div class="col-md-8">
				    <select id="gcode" name="gcode" class="form-control">
				      <option value="1">Umum</option>
				      <option value="2">Khusus</option>
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