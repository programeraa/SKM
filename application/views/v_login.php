<!doctype html>
 <html lang="en">

 <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>Login Form</title>
  <style>
   .container {
    margin-top: 100px;
  }
  .form-signin
  {
   max-width: 330px;
   padding: 15px;
   margin: 0 auto;
 }
 .form-signin .form-signin-heading, .form-signin .checkbox
 {
   margin-bottom: 10px;
 }
 .form-signin .checkbox
 {
   font-weight: normal;
 }
 .form-signin .form-control
 {
   position: relative;
   font-size: 16px;
   height: auto;
   padding: 10px;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
 }
 .form-signin .form-control:focus
 {
   z-index: 2;
 }
 .form-signin input[type="text"]
 {
   margin-bottom: -1px;
   border-bottom-left-radius: 0;
   border-bottom-right-radius: 0;
 }
 .form-signin input[type="password"]
 {
   margin-bottom: 10px;
   border-top-left-radius: 0;
   border-top-right-radius: 0;
 }
 .account-wall
 {
   margin-top: 20px;
   padding: 40px 0px 20px 0px;
   background-color: #f7f7f7;
   -moz-box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.3);
   -webkit-box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.3);
   box-shadow: 1px 0px 2px 2px rgba(0, 0, 0, 0.3);  
 }
 .login-title
 {
   color: #555;
   font-size: 18px;
   font-weight: 400;
   display: block;
 }
 .profile-img
 {
   width: 100px;
   height: auto;
   margin: 0 auto 10px;
   display: block;
 }
 .need-help
 {
   margin-top: 10px;
 }
 .new-account
 {
   display: block;
   margin-top: 10px;
 }
</style>
</head>

<body>

 <div class="container">
  <div class="row">
   <div class="mx-auto col-10 col-md-5 col-lg-4">   
    <div class="account-wall">
      <img class="profile-img" src="test.png"
      alt="">
      <form class="form-signin" method="POST" action="<?= base_url('login/login_aksi'); ?>">
       <div class="form-group">
        <label for="username">Username</label>
        <input type="username" name="username" class="form-control" id="username" aria-describedby="usernameHelp" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Masuk</button>
    </form>
    <p>
      <?php if (!empty($this->session->flashdata('gagal'))) { ?>
       <div class="alert alert-warning mr-4 ml-4">
        <?php echo $this->session->flashdata('gagal') ?>
      </div>
    <?php } ?>
  </p>
</div>
</div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>