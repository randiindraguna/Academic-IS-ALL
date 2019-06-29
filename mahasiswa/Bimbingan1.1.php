<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert2/dist/sweetalert2.min.css">

    <title></title>
  </head>



  <body style="background-color= #808080;">

<?php
    if (isset($_POST['nma'])) {

      include '../Db_bimbingan/database.php';

        $id = $_POST['nm'];
        $materi = $_POST['materi'];
        $id_skripsi = $_GET['id_s'];
        $tanggal = date('Y-m-d');
        $jam = date('h:i:s');
        $jenis = $_POST['jenis']; // edit di bagian ini lagi

        $cek = $car->masuk_ke_log($id,$materi,$id_skripsi,$tanggal,$jam,$jenis); 

        if(!$cek)
        {
          echo '
          <script type="text/javascript">
            Swal.fire({
              position: "middle",
              type: "warning",
              title: "terjadi kesalahan saat memproses data",
              showConfirmButton: false,
              timer: 1500 
            })
          </script>';
          header('Refresh: 1.5 URL=Bimbingan2.php?first');
        }
        else
        {
          echo
          "
          <script type='text/javascript'>
          	Swal.fire({
          		position: 'middle',
          		type: 'success',
          		title: 'berhasil menyimpan',
          		showConfirmButton: false,
          		timer: 1500
          		})
          </script>";
          header('Refresh: 1.5 URL=Bimbingan2.php?first');

        }
    }
?>
  	
    <center>
      <table width="70%" align="center" class="text text-light">
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td align="center"> 
            <!-- <form method="POST" action="index.php">
              nim : <input type="text" name="nim">
            </form> -->
          </td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td>
              <?php
              $malaria = $_POST['nim'];
              $ulala=$car->show_data($malaria);
              if($malaria==NULL || !$ulala)
              {

              }
	          else 
	          {
	           	if(isset($_POST['nim']))
                {
                  $nim = $_POST['nim'];
                  
                  $u=$car->show_data($nim);
              
                   foreach ($u as $ke){
                  if("$ke[model]"=="metopen")  ///  ===> DIBAWAH INI ADALAH TAMPILAN UNTUK MAHASISWA METOPEN
                  {

                  
                    
                    echo "
                        <form method='POST' action='Bimbingan1.1.php?id_s=$ke[idsk]'>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Nama Mahasiswa</label>
                            <input type='text' name='nma' class='form-control' id='exampleFormControlInput1' value='$ke[name]' readonly>
                          </div>
            </td>
          </tr>



          <tr>
            <td>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Nomer Induk Mahasiswa</label>
                            <input type='text' name='nm' class='form-control' id='exampleFormControlInput1' value='$ke[nim]' readonly>
                          </div>
            </td>
          </tr>

          

          <tr>
            <td>             
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Judul Skripsi Mahasiswa</label>
                            <input type='text' name='jdl' class='form-control' id='exampleFormControlInput1' value='$ke[judul]' readonly>
                          </div>
            </td>
          </tr>

          <tr>
            <td>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Dosen Pembimbing Mahasiswa</label>
                            <input type='text' name='dosbing' class='form-control' id='exampleFormControlInput1' value='$ke[namdos]' readonly>
                          </div>
            </td>        
          </tr>
          
          <tr>
            <td>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Status Konsultasi Mahasiswa</label>
                            <input type='text' name='nm' class='form-control' id='exampleFormControlInput1' value='$ke[model]' readonly>
                          </div>
            </td>
          </tr>

          

          <tr>
            <td>
                <div class='form-group'>
                  <label for='exampleFormControlTextarea1'>Materi Konsultasi Mahasiswa</label>
                  <textarea class='form-control' name='materi' id='exampleFormControlTextarea1' rows='3' required></textarea>
                  <div class='invalid-feedback'>
                    tolong isikan materi.
                  </div>
                </div>
            </td>
          </tr>

          <tr>
            <td>
                          <input hidden type='text' name='jenis' value='metopen'>
                          <button type='submit' class='btn btn-secondary btn-lg btn-block' >SAVE</button>
            </td>
          </tr>              
                        </form>

                      ";  
                    
                  
                  }
                  else
                  {
                    
                    echo "
                        <form method='POST' action='Bimbingan1.1.php?id_s=$ke[idsk]'>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Nama Mahasiswa</label>
                            <input type='text' name='nma' class='form-control' id='exampleFormControlInput1' value='$ke[name]' readonly>
                          </div>
            </td>
          </tr>

          <tr>
            <td>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Nomer Induk Mahasiswa</label>
                            <input type='text' name='nm' class='form-control' id='exampleFormControlInput1' value='$ke[nim]' readonly>
                          </div>
            </td>
          </tr>

          <tr>
            <td>             
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Judul Skripsi Mahasiswa</label>
                            <input type='text' name='jdl' class='form-control' id='exampleFormControlInput1' value='$ke[judul]' readonly>
                          </div>
            </td>
          </tr>

          <tr>
            <td>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Dosen Pembimbing Mahasiswa</label>
                            <input type='text' name='dosbing' class='form-control' id='exampleFormControlInput1' value='$ke[namdos]' readonly>
                          </div>
            </td>        
          </tr>

          <tr>
            <td>
                          <div class='form-group'>
                            <label for='exampleFormControlInput1'>Status Konsultasi Mahasiswa</label>
                            <input type='text' name='nm' class='form-control' id='exampleFormControlInput1' value='$ke[model]' readonly>
                          </div>
            </td>
          </tr>

         

          <tr>
            <td>
                <div class='form-group'>
                  <label for='exampleFormControlTextarea1'>Materi Konsultasi Mahasiswa</label>
                  <textarea class='form-control' name='materi' id='exampleFormControlTextarea1' rows='3' required></textarea>
                  <div class='invalid-feedback'>
                    tolong isikan materi.
                  </div>
                </div>
            </td>
          </tr>

          <tr>
            <td>
                          <input hidden type='text' name='jenis' value='skripsi'>
                          <button type='submit' class='btn btn-secondary btn-lg btn-block' >SAVE</button>
            </td>
          </tr>              
                        </form>

                      ";  
                  }  
                  
              	  }
                } 
                else
                {
                	echo "<center><div class='alert alert-secondary' role='alert'>SILAHKAN MASUKKAN NIM
</div></center>";
                }
       
	           }
                
              ?>
      </table>
    </center>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
      </body>
</html>