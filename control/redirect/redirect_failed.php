<form id="my_form" action="../UI_Penjadwalan.php" method="post">
<input type="hidden" name="nim" value="<?=$nim;?>">
<input type="hidden" name="nim" value="simpan">
</form>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
function alert() {
swal("GAGAL!", "Data Anda GAGAL tersimpan !", "error")
.then((value) => {simpan();})
}
function simpan() {
document.getElementById('my_form').submit();   
}                            
window.onload = alert;
</script> 