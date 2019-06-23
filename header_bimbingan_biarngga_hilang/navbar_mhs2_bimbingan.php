<!-- Dikerjakan dmonh3h3 -->

<head>
  <style>
    .dropdown:hover>.dropdown-menu {
      display: block;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-five">
    <div class="container">
      <div class="row mt-2">
        <div class="col-3">
          <img src="https://portal.uad.ac.id/themes/metronic/img/logo-default.png" alt="logo" class="logo-default">
        </div>
        <div class="col-3">
          <a class="navbar-brand" href="#">SIMBIS</a>
        </div>
        <div class="col-12"></div>
      </div>
      <div class="col-6 text-center">
        <div class="navbar-nav ml-auto">
          <!-- Nama Profile di navbar -->
          <!-- Harus Merubah Nama sesuai database -->
          <a class="nav-item nav-link ml-auto link2 mt-2" href="#"><?php echo $_SESSION['username'] ?><span
              class="sr-only ">(current)</span></a>
              <li class="dropdown"><img class=" w10-1 rounded-circle" src="../img/avatar_Penjadwalan2.jpeg">
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a href="#"><i class="dropdown-item"></i> Pengaturan</a></li>
                 <li><a href="#"><i class="dropdown-item"></i> Bantuan</a></li>
                 <li><a href="../logout.php"><i class="dropdown-item"></i> Logout</a></li>
             </ul>
             </li>
          
          <!-- End -->
        </div>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light bg-four">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link link2" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <!-- Metopen -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link2" href="#" id="navbarDropdownMenuLink" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Metopen
                </a>
                <div class="dropdown-menu navbox" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item  drop-link" href="input.php">Pendaftaran Metopen</a>
                  <a class="dropdown-item  drop-link" href="out2.php">Lihat Data Dosen</a>
                  <a class="dropdown-item  drop-link" href="caridata.php">Cari Data Mahasiswa</a>
                  <a class="dropdown-item  drop-link" href="lihat_semprop_dimahasiswa.php">Seminar Proposal</a>
                </div>
              </li>
              <!-- Skripsi -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link2" href="#" id="navbarDropdownMenuLink" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Skripsi
                </a>
                <div class="dropdown-menu navbox" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item  drop-link" href="Bimbingan2.php?first=0">Log Bimbingan</a>
                  <a class="dropdown-item  drop-link" href="lihat_pendadaran_dimahasiswa.php">Pendadaran</a>
                </div>
              </li>
              <!-- Jadwal -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link2" href="#" id="navbarDropdownMenuLink" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Jadwal
                </a>
                <div class="dropdown-menu navbox" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item  drop-link" href="UI_Penjadwalan_Mhs.php">Lihat Jadwal</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php
                
         
        if(!isset($_POST['nero']))
        {
          echo "
         <form class='form-inline my-2 my-lg-0' method='POST' action='Bimbingan2.php'>
         ";
            if(isset($_SESSION['username'])){
              echo "  <input type = 'text' name='nam' value='$abc[0]' hidden>";
            }

            if(isset($_POST['nam']))
            {
              $nim2 = $_POST['nam'];
              echo "  <input type = 'text' name='nam' value='$nim2' hidden>";
            }

            echo '
                  <input name="karakter" class="form-control mr-sm-2" type="search" placeholder="cari materi" aria-label="Search" required="inputkan nim">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">&telrec;</button>
          </form>
            ';
        }
      ?>

      
  </nav>
</body>
<!-- dmonh3h3 -->
