
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?php base_url() ?>/template/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <?php
              //pesan validasi error
              $errors = session()->getFlashdata('errors');
              if(!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                    </ul>
                </div>
               <?php } ?>
               
               <?php
               if(session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
               }
?>

<?php
               if(session()->getFlashdata('error')) {
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('error');
                echo '</div>';
               }
?>

              <div class="card-body">
             <?= form_open('auth/cek_login') ?>
             <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="email_user">Email</label>
                    <input id="email_user" name="email_user" type="email_user" class="form-control" tabindex="1" placeholder="Email" >
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password_user" class="control-label">Password</label>
                    </div>
                    <input id="password_user" type="password" class="form-control" name="password_user" placeholder="Password" tabindex="2">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
         <?= form_close() ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php base_url() ?>/template/assets/modules/jquery.min.js"></script>
  <script src="<?php base_url() ?>/template/assets/modules/popper.js"></script>
  <script src="<?php base_url() ?>/template/assets/modules/tooltip.js"></script>
  <script src="<?php base_url() ?>/template/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php base_url() ?>/template/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php base_url() ?>/template/assets/modules/moment.min.js"></script>
  <script src="<?php base_url() ?>/template/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?php base_url() ?>/template/assets/js/scripts.js"></script>
  <script src="<?php base_url() ?>/template/assets/js/custom.js"></script>

  <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $($this).remove();
        });
    },3000);
  </script>
</body>
</html>