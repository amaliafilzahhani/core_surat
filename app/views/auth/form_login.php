<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="<?=site_url()?>lib/login/images/imip.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">

              <div class="mb-4">
              <h3>Log In <strong>Aplikasi Surat</strong></h3>
              <p class="mb-4">PT Indonesia Morowali Industri Park</p>
              </div><br>
              
            <form action="<?=site_url('login');?>" method="post">
            <?=$this->session->tempdata('notif_login');?>
              <div class="form-group first">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required>
                <?=$token;?>
              </div><br><br><br>

              <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">
              
            </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>