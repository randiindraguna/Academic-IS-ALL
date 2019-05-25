var cek = document.getElementById('cekk');
var nim = document.getElementById('nim');
var isi = document.getElementById('isi');

nim.addEventListener('keyup', function ({
                (
                    // objek ajax
                    var xhr = new XMLHttpRequest(); xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            isi.innerHTML = xhr.responseText;
                        }
                    }
                    xhr.open('GET', 'templates/input_jadwal_tukar.php?data=' + nim, true) xhr.send();
                })