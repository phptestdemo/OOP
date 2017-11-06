$(".menu1").next('ul').toggle();

$(".menu1").click(function(event) {
    $(this).next("ul").toggle(500);
});

// validate form sign up
$(document).ready(function() {
    $("#signupForm").validate({
        rules: {
            name: {
                required: true,
                minlength:5
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            passwordAgain: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập họ tên",
                minlength: "Họ tên tối thiểu phải 5 kí tự"
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Không đúng định dạng email",
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu tối thiểu phải có 5 kí tự"
            },
            passwordAgain: {
                required: "Vui lòng nhập lại mật khẩu",
                minlength: "Mật khẩu nhập lại phải tối thiểu 5 kí tự",
                equalTo: "Mật khẩu nhập lại không trùng"
            }

        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-5" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    });
});