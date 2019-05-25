<?php
?>
<form id="my_form" action="../pengelola/UI_Penjadwalan_admin.php" method="post">

</form>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
function alert() {
swal("Selamat!", "Data Anda Berhasil Tersimpan!", "success")
.then((value) => {simpan();})
}
function simpan() {
document.getElementById('my_form').submit();   
}                            
window.onload = alert;
</script> 