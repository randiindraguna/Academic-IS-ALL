
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
           var y = document.getElementById("ulang-password");
              if (x.type === "password") {
                   x.type = "text";
                 } else {
                    x.type = "password";
                  }

               if (y.type === "password") {
                    y.type = "text";
                 } else {
                 y.type = "password";
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
        <div class="col-12 bg-warning p-3 box2">
          <a href="http://uad.ac.id"><img src="logo_uad.png" height=50px></a><a class="text-light ml-3"> Manajemen Skripsi UAD</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12 bg-light p-3 box"> 
           <?php if(isset($_GET['fail-usr'])){
                                echo"<center><p class=text-danger>Username telah digunakan</p></center>";
                            }
                        ?>
        <form action="daftarkanAkun.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="number" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukkan NIM sebagai Username anda" name="username" required>
            
          </div>
          <?php 
                if(isset($_GET['fail-psw'])){
                                echo"<center><p class=text-danger>Password tidak sama!!!</p></center>";
                            }
                        ?>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
          </div>
           <div class="form-group">
            <label for="exampleInputPassword1">Ulangi Password</label>
            <input type="password" class="form-control" id="ulang-password" placeholder="Ulangi Password" name="ulang-password" required>
            
          </div>
          <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="showpass" onclick="myFunction()">
            <label class="form-check-label" for="showpass">Show Password</label>
          </div>
          <button type="submit" class="btn btn-primary">Daftar</button>
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