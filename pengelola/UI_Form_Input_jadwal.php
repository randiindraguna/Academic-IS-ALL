<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
    //$id=$_GET['id_jadwal'];
 session_start();
    include '../Class_penjadwalan.php';
    include '../templates/header_penjadwalan.php';
    $P = new Penjadwalan();
    $P->connect();

    // echo $user;
    if(!$_SESSION['username']){
        //$_POST['user'];
        // $user = $_POST['user'];
        $user = 'admin';
        // echo "$user";
        $_SESSION['username']=$user;
    }
?>

</head>

<body class="bg-tre">
    <!-- Navbar -->
    <?php include '../templates/navbar_admin.html'?>
    <!-- End Navbar -->
    <div class="container">
        <div class="m-3">
            <!-- Box1 -->
            <div class="row ">
                <div class="box2-1 col-3 bg-two rounded  mt-5 mb-n3">
                    <p class="judul mt-3 mb-4 text-center">Tambah Jadwal</p>
                </div>
                <div class="col-9"></div>
            </div>
            <!-- Box 2 -->
            <div class="row box2 mb-5 mt3">
                <div class="col-12 mt-3">
                    <div class="row" id="switch">
                        <div class="col-12 mt-3">
                            <p class="judul text-center">
                                Seminar Proposal
                            </p>

                        </div>
                    </div>
                </div>
                <hr class="under mt-5" id="hr3">
                <!-- Semprop -->
                <div class="col-12 mt-3 pl-3 pr-3" id="semprop">

                    <div class="row">

                        <!-- Mahasiswa -->
                        <div class="col-6 mt-2">
                            <label for="inputAddress">Nim Mahasiswa</label>
                            <input class="form-control" id="nim" type="text" placeholder="Nim Mahasiswa" name="nim">
                        </div>
                        <div class="col-6 mt-2"></div>
                    </div>
                    <div id="isi">
                        <div class="row">
                            <div class="col-12 mb-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript Appear -->
    <!-- JavaScript Selecting Box -->
    <script>
        function showDiv() {
            var checkBox = document.getElementById("myCheck");
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                document.getElementById('semprop').style.display = "block";
                document.getElementById('pendadaran').style.display = "none";
            } else if (checkBox.checked == false) {
                document.getElementById('pendadaran').style.display = "block";
                document.getElementById('semprop').style.display = "none";
            } else {
                document.getElementById('uji2').style.display = "none";
                document.getElementById('uji2').style.display = "none";
            }
        }

        function alert() {
            var dosen1 = document.getElementById('penguji1');
            var dosen2 = document.getElementById('penguji2');
            if (dosen1 == null || dosen1 == "" && dosen2 == null) {
                swal("Good job!", "You clicked the button!", "warning");
            }
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- dATEPICKER -->
    <script src="../css/Datepicker_Penjadwalan/js/bootstrap-datepicker.js"></script>
    <script src="../css/Datepicker_Penjadwalan/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/form2.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true
            });
        });
    </script>

</body>

</html>
