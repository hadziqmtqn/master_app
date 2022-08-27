<script type="text/javascript">
    $( document ).ready( function () {
        $( "#login" ).validate( {
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
            },
            messages: {
                email: {
                    required: "Email Wajib diisi",
                    email: "Email Harus Valid",
                },
                password: {
                    required: "Password Wajib diisi",
                    minlength: "Password Wajib minimal 8 karakter unik",
                },
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "invalid-feedback" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else {
                    error.insertAfter( element );
                }
            },
        } );
    } );
</script>