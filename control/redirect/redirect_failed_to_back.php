<?php
?>
<form id="my_form" action="../pengelola/UI_Form_Input_jadwal.php" method="post">
	<input type="hidden" name="user" value="admin">
	<?php 
	session_start();
	$_SESSION['username']=NULL;
	?>
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
