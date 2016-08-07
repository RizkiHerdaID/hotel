<div class="row">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-warning">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h4>Daftar Pengguna & Hak Akses</h4></div>

	  <!-- Table -->
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
                            <td><?=$list['name']?></td>
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
		  <div class="panel-heading"><h4>Tambah Pengguna Admin</h4></div>
		  <div class="panel-body">
		    <form class="form-horizontal">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="username">Username</label>  
				  <div class="col-md-8">
				  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Password input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="password">Password</label>
				  <div class="col-md-8">
				    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fname">Nama Depan</label>  
				  <div class="col-md-8">
				  <input id="fname" name="fname" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="lname">Nama Belakang</label>  
				  <div class="col-md-8">
				  <input id="lname" name="lname" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Text input-->
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

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="level">Level</label>
				  <div class="col-md-8">
				    <select id="level" name="level" class="form-control">
				      <option value="1">Administrator</option>
				      <option value="2">Operator</option>
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