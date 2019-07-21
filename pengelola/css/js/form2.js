var cek = document.getElementById('cekk');
var nim = document.getElementById('nim');
var isi = document.getElementById('isi');

nim.addEventListener('keyup', function () {

    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        console.log(nim.value);
        isi.innerHTML = xhr.responseText;
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true
            });
        });
    }
    xhr.open('GET', '../templates/input_jadwal_tukar.php?data=' + nim.value, true)
    xhr.send();
})