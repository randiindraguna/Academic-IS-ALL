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
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    const cp = $(this).data('cp');
                                
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;
                    var cpb = cp;

                    console.log(cpb);
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
                    if (ju == "UP" && status == "lulus") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit, karena sudah lulus';
                        xhr.send();
                    } else if (ju == "UP" && status == "tidak_lulus" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "0" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "1" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Ujian Pendadaran, karena telah lewat massa edit';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" && jubim >= 10 && labim >= 60) {
                        xhr.open('GET', '../templates/edit_semprop_ke_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Input Data Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Maaf Belum Bisa Mendaftar, karena belum memenuhi syarat';
                        xhr.send();
                    }else if (ju == "SP" && status == "tidak_lulus") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "0") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "1") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Jadwal Seminar Proposal, karena telah lewat massa edit';
                        xhr.send();
                    }
                });
            })
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
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    const cp = $(this).data('cp');
                                
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;
                    var cpb = cp;

                    console.log(cpb);
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
                    if (ju == "UP" && status == "lulus") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit, karena sudah lulus';
                        xhr.send();
                    } else if (ju == "UP" && status == "tidak_lulus" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "0" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "1" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Ujian Pendadaran, karena telah lewat massa edit';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" && jubim >= 10 && labim >= 60) {
                        xhr.open('GET', '../templates/edit_semprop_ke_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Input Data Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Maaf Belum Bisa Mendaftar, karena belum memenuhi syarat';
                        xhr.send();
                    }else if (ju == "SP" && status == "tidak_lulus") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "0") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "1") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Jadwal Seminar Proposal, karena telah lewat massa edit';
                        xhr.send();
                    }
                });
            })
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=Pendadaran', true)
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
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    const cp = $(this).data('cp');
                                
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;
                    var cpb = cp;

                    console.log(cpb);
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
                    if (ju == "UP" && status == "lulus") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit, karena sudah lulus';
                        xhr.send();
                    } else if (ju == "UP" && status == "tidak_lulus" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "0" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "1" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Ujian Pendadaran, karena telah lewat massa edit';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" && jubim >= 10 && labim >= 60) {
                        xhr.open('GET', '../templates/edit_semprop_ke_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Input Data Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Maaf Belum Bisa Mendaftar, karena belum memenuhi syarat';
                        xhr.send();
                    }else if (ju == "SP" && status == "tidak_lulus") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "0") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "1") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Jadwal Seminar Proposal, karena telah lewat massa edit';
                        xhr.send();
                    }
                });
            })
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=terdekat', true)
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
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    const cp = $(this).data('cp');
                                
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;
                    var cpb = cp;

                    console.log(cpb);
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
                    if (ju == "UP" && status == "lulus") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit, karena sudah lulus';
                        xhr.send();
                    } else if (ju == "UP" && status == "tidak_lulus" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "0" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "1" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Ujian Pendadaran, karena telah lewat massa edit';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" && jubim >= 10 && labim >= 60) {
                        xhr.open('GET', '../templates/edit_semprop_ke_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Input Data Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Maaf Belum Bisa Mendaftar, karena belum memenuhi syarat';
                        xhr.send();
                    }else if (ju == "SP" && status == "tidak_lulus") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "0") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "1") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Jadwal Seminar Proposal, karena telah lewat massa edit';
                        xhr.send();
                    }
                });
            })
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
            $(function () {
                $('.modalku').on('click', function () {
                    const id = $(this).data('id');
                    const lb = $(this).data('lb');
                    const jb = $(this).data('jb');
                    const st = $(this).data('st');
                    const cp = $(this).data('cp');
                                
                    var ju = id.slice(0, 2);
                    var status = st;
                    var jubim = jb;
                    var labim = lb;
                    var cpb = cp;

                    console.log(cpb);
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
                    if (ju == "UP" && status == "lulus") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit, karena sudah lulus';
                        xhr.send();
                    } else if (ju == "UP" && status == "tidak_lulus" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "0" ) {
                        xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "UP" && status == "---" && cpb == "1" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Ujian Pendadaran, karena telah lewat massa edit';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" && jubim >= 10 && labim >= 60) {
                        xhr.open('GET', '../templates/edit_semprop_ke_pendadaran_modals.php?data=' + id, true)
                        var isijudulmodal = 'Input Data Ujian Pendadaran';
                        xhr.send();
                    } else if (ju == "SP" && status == "lulus" ) {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Maaf Belum Bisa Mendaftar, karena belum memenuhi syarat';
                        xhr.send();
                    }else if (ju == "SP" && status == "tidak_lulus") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Daftar Ulang Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "0") {
                        xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
                        var isijudulmodal = 'Edit Jadwal Seminar Proposal';
                        xhr.send();
                    } else if (ju == "SP" && status == "---" && cpb == "1") {
                        xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
                        var isijudulmodal = 'Tidak Bisa Mengedit Jadwal Seminar Proposal, karena telah lewat massa edit';
                        xhr.send();
                    }
                });
            })
        }
    }
    xhr.open('GET', '../templates/tabel_penjadwalan.php?data=' + key.value, true)
    xhr.send();
})

$(function () {
    $('.modalku').on('click', function () {
        const id = $(this).data('id');
        const lb = $(this).data('lb');
        const jb = $(this).data('jb');
        const st = $(this).data('st');
        const cp = $(this).data('cp');
                    
        var ju = id.slice(0, 2);
        var status = st;
        var jubim = jb;
        var labim = lb;
        var cpb = cp;

        console.log(cpb);
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
        if (ju == "UP" && status == "lulus") {
            xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
            var isijudulmodal = 'Tidak Bisa Mengedit, karena sudah lulus';
            xhr.send();
        } else if (ju == "UP" && status == "tidak_lulus" ) {
            xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
            var isijudulmodal = 'Daftar Ulang Ujian Pendadaran';
            xhr.send();
        } else if (ju == "UP" && status == "---" && cpb == "0" ) {
            xhr.open('GET', '../templates/edit_pendadaran_modals.php?data=' + id, true)
            var isijudulmodal = 'Edit Ujian Pendadaran';
            xhr.send();
        } else if (ju == "UP" && status == "---" && cpb == "1" ) {
            xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' + id, true)
            var isijudulmodal = 'Tidak Bisa Mengedit Ujian Pendadaran, karena telah lewat massa edit';
            xhr.send();
        } else if (ju == "SP" && status == "lulus" && jubim >= 10 && labim >= 60) {
            xhr.open('GET', '../templates/edit_semprop_ke_pendadaran_modals.php?data=' + id, true)
            var isijudulmodal = 'Input Data Ujian Pendadaran';
            xhr.send();
        } else if (ju == "SP" && status == "lulus" ) {
            xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
            var isijudulmodal = 'Maaf Belum Bisa Mendaftar, karena belum memenuhi syarat';
            xhr.send();
        }else if (ju == "SP" && status == "tidak_lulus") {
            xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
            var isijudulmodal = 'Daftar Ulang Jadwal Seminar Proposal';
            xhr.send();
        } else if (ju == "SP" && status == "---" && cpb == "0") {
            xhr.open('GET', '../templates/edit_semprop_modals.php?data=' + id, true)
            var isijudulmodal = 'Edit Jadwal Seminar Proposal';
            xhr.send();
        } else if (ju == "SP" && status == "---" && cpb == "1") {
            xhr.open('GET', '../control/redirect/redirect_failed_to_back.php' , true)
            var isijudulmodal = 'Tidak Bisa Mengedit Jadwal Seminar Proposal, karena telah lewat massa edit';
            xhr.send();
        }
    });
})
