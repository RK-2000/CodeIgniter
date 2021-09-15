 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>AdminLTE 3 | Registration Page</title>

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
     <!-- icheck bootstrap -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
 </head>

 <body class="hold-transition register-page">

     <div>
         <?php 
    if ($this->session->flashdata('message') != NULL)
    {   echo($this->session->flashdata('message'));
        
    }    
    ?>
     </div>
     <div class="register-box">
         <div class="register-logo">
             <a href="#"><b>Admin</b>LTE</a>
         </div>

         <div class="card">
             <div class="card-body register-card-body">
                 <p class="login-box-msg">Register a new membership</p>

                 <form action='<?php echo base_url()?>' method="post">
                     <div class="input-group mb-3">
                         <input value="<?php if($this->session->flashdata('name')){
                             echo $this->session->flashdata('name');} ?>" type="text" class="form-control"
                             placeholder="Full name" name="name" required>
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-user"></span>
                             </div>
                         </div>
                     </div>
                     <div class="input-group mb-3">
                         <input value="<?php if($this->session->flashdata('email')){
                             echo $this->session->flashdata('email');} ?>" type="email" class="form-control"
                             placeholder="Email" name="email" required>
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-envelope"></span>
                             </div>
                         </div>
                     </div>
                     <div class="input-group mb-3">
                         <input value="<?php if($this->session->flashdata('password')){
                             echo $this->session->flashdata('password');} ?>" type="password" class="form-control"
                             placeholder="Password" name="password" required>
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-lock"></span>
                             </div>
                         </div>
                     </div>
                     <div class="input-group mb-3">
                         <input type="password" class="form-control" placeholder="Retype password" name="r_password"
                             required>
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-lock"></span>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-8">
                             <div class="icheck-primary">
                                 <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                 <label for="agreeTerms">
                                     I agree to the <a href="#">terms</a>
                                 </label>
                             </div>
                         </div>
                         <!-- /.col -->
                         <div class="col-4">
                             <button type="submit" class="btn btn-primary btn-block">Register</button>
                         </div>
                         <!-- /.col -->
                     </div>
                 </form>

                 <div class="social-auth-links text-center">
                     <p>- OR -</p>
                     <a href="#" class="btn btn-block btn-primary">
                         <i class="fab fa-facebook mr-2"></i>
                         Sign up using Facebook
                     </a>
                     <a href="#" class="btn btn-block btn-danger">
                         <i class="fab fa-google-plus mr-2"></i>
                         Sign up using Google+
                     </a>
                 </div>

                 <a href="<?php echo base_url(); ?>login" class="text-center">I already have a membership</a>
             </div>
             <!-- /.form-box -->
         </div><!-- /.card -->
     </div>
     <!-- /.register-box -->

     <!-- jQuery -->
     <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap 4 -->
     <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- AdminLTE App -->
     <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
 </body>

 </html>