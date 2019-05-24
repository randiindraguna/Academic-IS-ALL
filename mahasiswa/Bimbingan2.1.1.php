<?php
include 'database.php';
$car = new Database();
$car->connect();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
  </head>
<body>

<table width="100%" height="100%" cellpadding="20">
  <tr>
    <td>

          <h2 align="center">Log Bimbingan Skripsi</h2>
          <?php
          $id = $_POST['true_nim'];
          $use = $car->getHeaderLogbimbingan($id);
          foreach ($use as $key) {
            # code...
           echo "
          <div class='ml-4 pb-4 pt-5'>
            <table cellpadding='6'>
            <tr>
              <strong>

                <th>Nama Mahasiswa</th>
                <th align='center'> :</th>
                <th>$key[nama]</th>

              </strong>
            </tr>
            <tr>
              <strong>
                <th>Nomer Induk Mahasiswa</th>
                <th align='center'> :</th>
                <th>$key[nim]</th>
              </strong>
            </tr>
            <tr>
              <strong>
                <th>Dosen Pembimbing Mahasiswa</th>
                <th align='center'> :</th>
                <th>$key[namdos]</th>
              </strong>
            </tr>
          </table>         
        </div>
          ";
          }
          ?>
        <div class="container">

          <table class="table table-light table-stripe tp-2" align="center">
            <thead>
              <tr align="center" class="bg-secondary" >
                <th rowspan="2" class="align-middle">MATERI Konsultasi</th>
                <th colspan="2" align="center">WAKTU Konsultasi</th>
                <th rowspan="2" colspan="2" class="align-middle">ACTION</th>
              </tr>
              <tr align="center" class="bg-secondary">
                <th align="center" colspan="">tanggal</th>
                <th align="center">jam mulai</th>
              </tr>
              <tr>

              </tr>
            </thead>
            <tbody align="center">

              <?php
              
              $malaria = $_POST['nim2'];
              $ulala=$car->show_data($malaria); // sebagai pendeteksi saja
              if($malaria==NULL || !$ulala)
              {
//              echo "<center><div class='alert alert-secondary' role='alert'>SILAHKAN MASUKKAN NIM</div></center>";
              }
              else
              {
                  $id = $_POST['nim2'];
                  $g = $car->select_one_mahasiswa_by_id_log($id); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                  foreach($g as $key)
                  {
                    if("$key[model]"=="metopen")
                    {
                    echo"
                      <tr class='bg-success'>
                        <form method='POST' action='Bimbingan2.php'>
                          <td><textarea value='$key[materi_bimbingan]' name='materi' Required></textarea></td>
                          <td><input value='$key[tanggal_bimbingan]' type='text' name='tanggal' Required></td>
                          <td><input value='$key[jam]' type='text' name='jam' Required></td>
                          
                          <input type='text' name='nim' value='$key[Nm]' hidden>
                        
                        <td>
        
                            <input name='idd' type='text' value=$key[id] hidden></input>
                            <input type='submit' class='btn btn-primary' value='SAVE' name='save' > </input>
                        </form>

                        </td>

                        <td>
                        <form method='POST' action='Bimbingan2.php'>

                          <input type='text' name='nim' value='$key[Nm]' hidden>
                          <input type='submit' class='btn btn-primary' value='CANCEL'>
                        </form>
                      </td>
                      </tr>
                    ";
                    }
                    else
                    {
                    echo"
                      <tr class='bg-primary'>
                       <form method='POST' action='Bimbingan2.php'>
                        <td><textarea value='$key[materi_bimbingan]' name='materi' Required></textarea></td>
                        <td><input value='$key[tanggal_bimbingan]' type='text' name='tanggal' Required></td>
                        <td><input value='$key[jam]' type='text' name='jam' Required></td>
                        <input type='text' name='nim' value='$key[Nm]' hidden>
                        <td>
        
                        <input name='idd' type='text' value=$key[id] hidden></input>
                            <input type='submit' class='btn btn-success' value='SAVE' name='save' > </input>
                        </form>
                        </td>
                        <td>
                        <form method='POST' action='Bimbingan2.php'>
                          <input type='text' name='nim' value='$key[Nm]' hidden>
                          <input type='submit' class='btn btn-success' value='CANCEL'>
                        </form>
                      </td>
                      </tr>
                    ";
                    }
                  }
              }
              ?>
            </tbody>
          </table>
        </div>
        <div align="left" class="ml-4">
        ket : <br>
        -hijau = metopen<br>
        -biru  = skripsi
        </div>
    </td>
  </tr>
    
</table>

</body>
</html>
