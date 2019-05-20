<?php 
    if(isset($_GET['succes'])){
        echo '<script type="text/javascript">alert("Pendaftaran berhasil")</script>';
    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
    .box2{
          border-radius: 7px 7px 0px 0px;
          box-shadow: 1px 1px 12px grey;
    }
    .box{
          border-radius: 0px 0px 7px 7px;
          box-shadow: 1px 1px 12px grey;
    }
    </style>
    <title>Login page</title>
      <script type="text/javascript">
        function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
  </head>
  <body>
<div class="container">
  <div class="row mb-5 ">
    <div class="col-3"></div>
    <div class="col-6 ">
      <div class="row mt-5 ">
        <div class="col-12 bg-info p-3 box2">
          <a href="http://uad.ac.id"><img src="logo_uad.png" height=50px></a><a class="text-light ml-3"> Manajemen Skripsi UAD</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12 bg-light p-3 box"> 
            <?php 
                            if(isset($_GET['fail'])){
                                echo"<center><p class=text-danger>Kesalahan saat login, silahkan ulangi lagi</p></center>";
                            }
                        ?>
        <form action="index_login2.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
          </div>
          <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="showpass" onclick="myFunction()">
            <label class="form-check-label" for="showpass">Show Password</label>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
         <a href="formInputAkun.php" class="btn btn-warning">belum punya akun? Daftar</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>