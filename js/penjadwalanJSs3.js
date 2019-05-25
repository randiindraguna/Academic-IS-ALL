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

// Seminar Proposal
semprop.addEventListener('click', function () {
    console.log(semprop.value);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    console.log(id);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var ju = id.slice(0, 2);
                            console.log(ju);
                            if (ju == "UP") {
                                isimodals.innerHTML = xhr.responseText;
                                document.getElementById('dosen_penguji2').style.display = "block";
                            } else {
                                isimodals.innerHTML = xhr.responseText;
                            }
                        }
                    }
                    xhr.open('GET', 'control/edit_withmodals.php?data=' + id, true)
                    xhr.send();
                });
            })
        }
    }
    xhr.open('GET', 'templates/tabel_penjadwalan.php?data=Semprop', true)
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
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    console.log(id);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var ju = id.slice(0, 2);
                            console.log(ju);
                            if (ju == "UP") {
                                isimodals.innerHTML = xhr.responseText;
                                document.getElementById('dosen_penguji2').style.display = "block";
                            } else {
                                isimodals.innerHTML = xhr.responseText;
                            }
                        }
                    }
                    xhr.open('GET', 'control/edit_withmodals.php?data=' + id, true)
                    xhr.send();
                });
            })
        }
    }
    xhr.open('GET', 'templates/tabel_penjadwalan.php?data=Pendadaran', true)
    xhr.send();
})
// Jadwal Terdekat
terdekat.addEventListener('click', function () {
    console.log(terdekat.value);
    // objek ajax
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tabel.innerHTML = xhr.responseText;
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    console.log(id);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var ju = id.slice(0, 2);
                            console.log(ju);
                            if (ju == "UP") {
                                isimodals.innerHTML = xhr.responseText;
                                document.getElementById('dosen_penguji2').style.display = "block";
                            } else {
                                isimodals.innerHTML = xhr.responseText;
                            }
                        }
                    }
                    xhr.open('GET', 'control/edit_withmodals.php?data=' + id, true)
                    xhr.send();
                });
            })
        }
    }
    xhr.open('GET', 'templates/tabel_penjadwalan.php?data=terdekat', true)
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
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    console.log(id);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var ju = id.slice(0, 2);
                            console.log(ju);
                            if (ju == "UP") {
                                isimodals.innerHTML = xhr.responseText;
                                document.getElementById('dosen_penguji2').style.display = "block";
                            } else {
                                isimodals.innerHTML = xhr.responseText;
                            }
                        }
                    }
                    xhr.open('GET', 'control/edit_withmodals.php?data=' + id, true)
                    xhr.send();
                });
            })
        }
    }
    xhr.open('GET', 'templates/tabel_penjadwalan.php?data=all', true)
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
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    console.log(id);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var ju = id.slice(0, 2);
                            console.log(ju);
                            if (ju == "UP") {
                                isimodals.innerHTML = xhr.responseText;
                                document.getElementById('dosen_penguji2').style.display = "block";
                            } else {
                                isimodals.innerHTML = xhr.responseText;
                            }
                        }
                    }
                    xhr.open('GET', 'control/edit_withmodals.php?data=' + id, true)
                    xhr.send();
                });
            })
        }
    }
    xhr.open('GET', 'templates/tabel_penjadwalan.php?data=' + key.value, true)
    xhr.send();
})
$(function () {
    $('.modalku').on('click', function () {
        const id = $(this).data('id');
        console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var ju = id.slice(0, 2);
                console.log(ju);
                if (ju == "UP") {
                    isimodals.innerHTML = xhr.responseText;
                    document.getElementById('dosen_penguji2').style.display = "block";
                } else {
                    isimodals.innerHTML = xhr.responseText;
                }
            }
        }
        xhr.open('GET', 'control/edit_withmodals.php?data=' + id, true)
        xhr.send();
    });
})