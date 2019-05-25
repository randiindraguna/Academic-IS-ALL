var key = document.getElementById('key');
var semprop = document.getElementById('semprop');
var pendadaran = document.getElementById('pendadaran');
var all = document.getElementById('all');
var tabel = document.getElementById('tabel');

// Seminar Proposal
semprop.addEventListener('click', function () {
    console.log(semprop.value);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=Semprop', true)
    xhr.send();
})
// Pendadaran
pendadaran.addEventListener('click', function () {
    console.log(pendadaran.value);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=Pendadaran', true)
    xhr.send();
})
// Smeua data jadwal
all.addEventListener('click', function () {
    console.log(all.value);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=all', true)
    xhr.send();
})
// Search
key.addEventListener('keyup', function () {
    console.log(key.value);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=' + key.value, true)
    xhr.send();
})