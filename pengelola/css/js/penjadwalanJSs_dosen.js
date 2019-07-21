var key = document.getElementById('key');
var semprop = document.getElementById('semprop');
var pendadaran = document.getElementById('pendadaran');
var all = document.getElementById('all');
var tabel = document.getElementById('tabel');
var terdekat = document.getElementById('terdekat');
// Modals Work Fine
var modals = document.getElementById('modalku');
var Id_Jadwal = document.getElementById('jadwal');
var isimodals = document.getElementById('isimodal');
var judulmodal = document.getElementById('ModalUbahjudul');


// Jadwal Terdekat
terdekat.addEventListener('click', function () {
    var a = all.value;
    console.log(a);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    
                   
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;

                    console.log(id);
                    console.log(jubim);
                    console.log(labim);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(ju);
                            console.log(status);
                            isimodals.innerHTML = xhr.responseText;
                            judulmodal.innerHTML = isijudulmodal;
                        }
                    }
                    
                });
            })
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan_dosen.php?data=terdekat&&_niy='+a, true)
    xhr.send();
})

// Smeua data jadwal
all.addEventListener('click', function () {
    var a = all.value;
    console.log(a);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    
                   
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;

                    console.log(id);
                    console.log(jubim);
                    console.log(labim);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(ju);
                            console.log(status);
                            isimodals.innerHTML = xhr.responseText;
                            judulmodal.innerHTML = isijudulmodal;
                        }
                    }
                    
                });
            })
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan_dosen.php?data=all&&_niy='+a, true)
    xhr.send();
})
// Search

$(function () {
    $('.modalku').on('click', function () {
        const id = $(this).data('id');
        const lb = $(this).data('lb');
        const jb = $(this).data('jb');
        const st = $(this).data('st');
                    
        var ju = id.slice(0, 2);
        var status = st;
        var jubim = jb;
        var labim = lb;

        console.log(id);
        console.log(jubim);
        console.log(labim);
        console.log(status);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                isimodals.innerHTML = xhr.responseText;
                judulmodal.innerHTML = isijudulmodal;
            }
        }
        
    });
})