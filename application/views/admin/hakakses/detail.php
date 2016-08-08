<style type="text/css" media="screen">
  .form-group {
    margin-bottom: 10px;
  } 
</style>

<div class="col-lg-8">
  <div class="panel panel-warning">
    <div class="panel-heading"><h4><?=$title?></h4></div>
    <div class="panel-body">
      <?php foreach($detail as $list): ?>
      <input id="userid" maxlength="30" name="userid" type="text" value="<?= set_value($list['user_id']) ?>" hidden/>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="username">Username</label>
        <div class="col-md-8">
          <label for="" class="labelDetail"><?= $list['username'] ?></label>
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="fname">Nama Depan</label>
        <div class="col-md-8">
          <label for="" class="labelDetail"><?= $list['first_name'] ?></label>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="lname">Nama Belakang</label>
        <div class="col-md-8">
          <label for="" class="labelDetail"><?= $list['last_name'] ?></label>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="email">E-mail</label>
        <div class="col-md-8">
          <label for="" class="labelDetail"><?= $list['email'] ?></label>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="phone">Telepon / HP</label>
        <div class="col-md-8">
          <label for="" class="labelDetail"><?= $list['phone'] ?></label>
        </div>
      </div>
      <?php endforeach; ?>
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="level">Level</label>
        <div class="col-md-8">
          <label for="" class="labelDetail"><?= $list['description'] ?></label>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <a href="<?=site_url('admin/hakakses')?>" class="btn btn-warning" >Kembali</a>
    </div>
  </div>
</div>