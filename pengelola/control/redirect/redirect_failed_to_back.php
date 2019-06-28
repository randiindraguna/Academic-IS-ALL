<?php
?>
<form id="my_form" action="../pengelola/UI_Form_Input_jadwal.php" method="post">
<input type="hidden" name="nim" value="<?=$nim;?>">
<input type="hidden" name="a" value="simpan">
</form>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
function alert() {
swal("GAGAL!", "Data Anda GAGAL tersimpan !", "error")
.then((value) => {back(value);})
}
function back(value) {
            if (value==true) {
                window.history.back();
            }
        }                           
window.onload = alert;
</script> 