$(function() {
    $('.toggle-password').on('click', function() {
        const input = $($(this).attr('data-input'))

        if ( input.attr('type') === 'password' ) {
            input.attr('type', 'text')
        } else {
            input.attr('type', 'password')
        }
    })

    $('.validatePassword').on('keyup', function() {
        let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/;

        if ( $(this).val() === "" || regex.test($(this).val()) ) {
            $(this).removeClass('input-error')
            $(this).addClass('input-success')
            $('.passwordError').hide()
            $('.submit-btn').removeAttr('disabled')
        } else {
            $(this).removeClass('input-success')
            $(this).addClass('input-error')
            $('.passwordError').show()
            $('.submit-btn').attr('disabled', 'true')
        }
    })

    $('#confirmPassword').on('keyup', function() {
        const password = $('#password').val()

        if ( !$(this).val() || password === $(this).val() ) {
            $(this).removeClass('input-error')
            $(this).addClass('input-success')
            $('.confirmError').hide()
            $('.submit-btn').removeAttr('disabled')
        } else {
            $(this).removeClass('input-success')
            $(this).addClass('input-error')
            $('.confirmError').show()
            $('.submit-btn').attr('disabled', 'true')
        }
    })
})