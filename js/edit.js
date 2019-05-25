$(function () {
    $('.tampilModalUbah').on('click', function () {
        const id = $(this).data('id');
        console.log(id);
        jQuery.ajax({
            url: 'localhost:../control/edit.php',
            data: {
                id_jadwal: id
            },
            dataType: 'json',
            method: 'post',
            succes: function (data) {
                console.log(data);
            }
        });
    });


});