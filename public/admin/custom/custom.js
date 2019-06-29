function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#target_image').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#change_image").change(function () {
    readURL(this);
});


$(document).ready(function () {

    $('#my-id').innerText = 'do you love me';


    // remove session messages

    setTimeout(function () {
        $('.alert').hide('slow');
    }, 2000);


    $('#myDatepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    $('#end-time').datetimepicker({
        format: 'hh:mm A'
    });
    $('#privilege').select2();


    CKEDITOR.replace('description');

});