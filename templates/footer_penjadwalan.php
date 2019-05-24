    <!-- Javascript Appear -->
    <!-- JavaScript Selecting Box -->
    <script>
        function showDiv() {
            var checkBox = document.getElementById("myCheck");
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                document.getElementById('uji2').style.display = "block";
                document.getElementById('uji1').style.display = "none";
            } else if (checkBox.checked == false) {
                document.getElementById('uji1').style.display = "block";
                document.getElementById('uji2').style.display = "none";
            } else {
                document.getElementById('uji2').style.display = "none";
                document.getElementById('uji2').style.display = "none";
            }
        }
        function alert() {
            var dosen1=document.getElementById('penguji1');
            var dosen2=document.getElementById('penguji2');
            if (dosen1==null || dosen1==""  && dosen2==null) {
                swal("Good job!", "You clicked the button!", "warning");    
            }
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- dATEPICKER -->
    <script src="css/Datepicker_Penjadwalan/js/bootstrap-datepicker.js"></script>
    <script src="css/Datepicker_Penjadwalan/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true
            });
        });
        window.onload = codeAddress;
    </script>
    
</body>

</html>
