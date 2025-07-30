$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contactForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            subject: {
                required: true,
                minlength: 4
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                minlength: 20
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "At least 2 characters required"
            },
            subject: {
                required: "Please enter a subject",
                minlength: "At least 4 characters required"
            },
            email: {
                required: "Please enter your email"
            },
            message: {
                required: "Please enter your message",
                minlength: "At least 20 characters required"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: '/store2',
                type: 'POST',
                data: $(form).serialize(),
                success: function (response) {
                    alert("Message sent successfully");
                    $('#contactForm')[0].reset();
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert("Error sending message.");
                }
            });
        }
    });
});
