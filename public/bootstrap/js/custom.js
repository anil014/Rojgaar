$(document).ready(function () {
    $("#job-search").keyup(function () {
        let data = $(this).val();

        if (data.length == 0) {
            $('#searchBox').html('<h1>Enter any keywords</h1>');
        } else {
            $.ajax({
                method: "GET",
                url: "action/jobsearch.php",
                data: {data: data},
                success: function (response) {
                    $('#searchBox').html(response);
                    $('#searchBox').css('display', 'block');

                }
            });
        }


    });

    //==========contact form validation


    $('#send-message').on('click', function (event) {
        event.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        if (name == '') {
            $('#name-error').html('name field is required');
            $('#name').focus();
            $('#name').css('border-color', 'red');
            return false;
        }
        if (email == '') {
            $('#email').focus();
            $('#email').css('border-color', 'red');
            return false;
        }

        if (subject == '') {
            $('#subject').focus();
            $('#subject').css('border-color', 'red');
            return false;
        }

        if (message == '') {
            $('#message').focus();
            $('#message').css('border-color', 'red');
            return false;
        }


        $.ajax({
            method: "POST",
            url: "action/contact.php",
            data: {
                name: name,
                email: email,
                subject: subject,
                message: message
            },
            success: function (response) {
                swal({
                    title: response,
                    text: response,
                    icon: "success",
                    button: false,
                    timer: 3000
                });
                let name = $('#name').val('');
                let email = $('#email').val('');
                let subject = $('#subject').val('');
                let message = $('#message').val('');

            }
        });


    });

    setTimeout(function () {
        $('.alert').hide('slow');
    }, 2000);


    $('#company-type').click(function () {
        let cmpType = $('#company').val();
        $.ajax({
            method: "POST",
            url: "action/add-company-type.php",
            data: {
                type_name: cmpType
            },
            success: function (response) {
                swal({
                    title: response,
                    text: response,
                    icon: "success",
                    button: false,
                    timer: 3000
                });

                setTimeout(function () {
                    location.reload();
                }, 3000);


            }
        });


    });


});



