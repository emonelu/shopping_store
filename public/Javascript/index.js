$(document).ready(function() {
    $('#close').click(function() {
        $('.cart-sidebar').css('display', 'none')
    })
    $('#close-login-box').click(function() {
        $('.floating-login').css('display', 'none')
    })
    $('#close-register-box').click(function() {
        $('.floating-register').css('display', 'none')
    })
    $('#close').click(function() {
        $('.floating').css('display', 'none')

    })
    $('#cart-open').click(function() {
        $('.cart-sidebar').css('display', 'flex')

    })
    $('#reveal_token').click(function() {
        $('.floating').css('display', 'flex')
    })
    
    $('#login-button').click(function() {
        $('.floating-login').css('display', 'flex')
    })
    $('#register-button').click(function() {
        $('.floating-register').css('display', 'flex')
    })
    $('#categories-hoverable').click(function() {
        $('.categories').css('display', 'flex')

    })
    if($('#login_status').val()==1){
        $('#user_list').removeClass('user-disabled');
    }
})