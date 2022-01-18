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
        $('#info').addClass('tabs-active')
        $('#history').removeClass('tabs-active')
        $('#deposit').removeClass('tabs-active')
        $('#checkout').removeClass('tabs-active')
        $('#info-tab').removeClass('hide').addClass('show')
        $('#checkout-tab').removeClass('show').addClass('hide')
        $('#history-tab').removeClass('show').addClass('hide')
        $('#info-tab').removeClass('show').addClass('hide')
        console.log('wtf');
    })
    $('#checkout').click(function() {
        $('#checkout').addClass('tabs-active')
        $('#history').removeClass('tabs-active')
        $('#deposit').removeClass('tabs-active')
        $('#checkout-tab').removeClass('hide').addClass('show')
        $('#info-tab').removeClass('show').addClass('hide')
        $('#history-tab').removeClass('show').addClass('hide')
        $('#info-tab').removeClass('show').addClass('hide')
        console.log('wtf');
    })
    $('#history').click(function() {
        $('#history').addClass('tabs-active')
        $('#info').removeClass('tabs-active')
        $('#deposit').removeClass('tabs-active')
        $('#checkout').removeClass('tabs-active')
        $('#history-tab').removeClass('hide').addClass('show')
        $('#info-tab').removeClass('show').addClass('hide')
        $('#deposit-tab').removeClass('show').addClass('hide')
        $('#checkout-tab').removeClass('show').addClass('hide')
        console.log('wtf');

    })
    $('#deposit').click(function() {
        $('#deposit').addClass('tabs-active')
        $('#history').removeClass('tabs-active')
        $('#info').removeClass('tabs-active')
        $('#checkout').removeClass('tabs-active')
        $('#deposit-tab').removeClass('hide').addClass('show')
        $('#info-tab').removeClass('show').addClass('hide')
        $('#history-tab').removeClass('show').addClass('hide')
        $('#checkout-tab').removeClass('show').addClass('hide')
        console.log('wtf');
    })
})