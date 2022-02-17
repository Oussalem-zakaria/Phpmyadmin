$(document).ready(function() {

    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        // $('#update_id').val(data[0]);
        $('#codec').val(data[0]);
        $('#filiere').val(data[1]);
        $('#num').val(data[2]);
    });
});

$(document).ready(function() {

    $('.editbtn1').on('click', function() {

        $('#editmodal1').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        // $('#update_id').val(data[0]);
        $('#codec').val(data[0]);
        $('#user').val(data[1]);
        $('#pswd').val(data[2]);
    });
});


$(document).ready(function() {

    $('.dlt').on('click', function() {

        $('#dltmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        $('#code').val(data[0]);
        // $('#id').val(data[0]);
    });
});

$(document).ready(function() {

    $('.dlt1').on('click', function() {

        $('#dltmodal1').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        $('#dlt_id1').val(data[0]);
        // $('#id').val(data[0]);
    });
});
