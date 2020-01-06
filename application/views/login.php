<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/stylelogin.css">


    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">


  
  </head>
  <body style="background-image: url('asset/img/background.jpg'); background-size:100% 140%;">
    <div class="container form-login">

      <form class="form-signin col-md-6 col-md-offset-3 outter-form-login" role="form" style="background-color: white;" 

      method="post" action="<?php echo base_url().'login/auth'?>">

        <div style="height: 90px;background-size:100% 100%; background-image: url('asset/img/bgr.jpg')";>
            
        </div><br>


        <div class="form-group">
           <label class="control-label"><small>Login Akun</small></label><br>
           <?php echo $this->session->flashdata('msg');?>
           

      </div>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="username" id="username" required autofocus>
        </div>
        <br/>

        <div class="input-group">
           <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
           <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password" id="password" required>
      </div><br>

        <button class="btn btn-primary form-control" type="submit" style="background-color: #f5613b;">Masuk</button>
      </form>

    </div>  




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
  </body>
</html>