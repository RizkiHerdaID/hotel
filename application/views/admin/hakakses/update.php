<div class="col-lg-8">
  <form action="<?=site_url('admin/hakAkses/update')?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
    <div class="panel panel-warning">
      <div class="panel-heading"><h4><?=$title?></h4></div>
      <div class="panel-body">
        <?php foreach($detail as $list): ?>
        <fieldset>
          <input id="userid" maxlength="30" name="userid" type="text" value="<?= $list['user_id'] ?>" hidden/>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="username">Username</label>
            <div class="col-md-8">
              <input id="username" maxlength="30" name="username" type="text" value="<?= $list['username'] ?>" placeholder="" class="form-control input-md" required="" disabled>
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="fname">Nama Depan</label>
            <div class="col-md-8">
              <input id="fname" maxlength="50" name="fname" type="text" value="<?= $list['first_name'] ?>" placeholder="" class="form-control input-md" required="">
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="lname">Nama Belakang</label>
            <div class="col-md-8">
              <input id="lname" maxlength="50" name="lname" type="text" value="<?= $list['last_name'] ?>" placeholder="" class="form-control input-md" required="">
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="email">E-mail</label>
            <div class="col-md-8">
              <input id="email" maxlength="100" name="email" type="text" value="<?= $list['email'] ?>" placeholder="" class="form-control input-md" required="">
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="phone">Telepon / HP</label>
            <div class="col-md-8">
              <input id="phone" maxlength="20" name="phone" type="text" value="<?= $list['phone'] ?>" placeholder="" class="form-control input-md" required="">
              
            </div>
          </div>
          <input id="level" maxlength="20" name="level" type="text" value="<?= $list['group_id'] ?>" hidden />
        </fieldset>
        <?php endforeach; ?>
      </div>
      <div class="panel-footer">
        <a href="<?=site_url('admin/hakakses')?>" class="btn btn-warning" >Kembali</a>
        <button id="Submit" name="Submit" class="btn btn-success pull-right">Update</button>
      </div>
    </div>
  </form>
</div>