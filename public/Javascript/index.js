$(document).ready(function() {
    $('#close').click(function() {
        $('.cart-sidebar').css('display', 'none')
    })
    $('#close-login-box').click(function() {
        $('.login').css('display', 'none')
    })
    $('#close-register-box').click(function() {
        $('.register').css('display', 'none')
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
        $('.login').css('display', 'flex')
    })
    $('#register-button').click(function() {
        $('.register').css('display', 'flex')
    })
    $('#remove-cart').click(function() {
        console.log('hey');
    })
    $('#categories-hoverable').click(function() {
        $('.categories').css('display', 'flex')
    })
    if($('#login_status').val()==1){
        $('#user_list').removeClass('user-disabled');
    }
    $('#info').click(function() {
        $('.history').addClass('hide')
        $('.userinfo').removeClass('hide').addClass('block')
        $('.wallet').addClass('hide')
    })
    $('#purchases').click(function() {
        $('.history').removeClass('hide')
        $('.userinfo').addClass('hide').removeClass('block')
        $('.wallet').addClass('hide')
    })
    $('#wallet').click(function() {

        $('.wallet').removeClass('hide')
        $('.history').addClass('hide')
        $('.info').addClass('hide').removeClass('block')
    })
   
})