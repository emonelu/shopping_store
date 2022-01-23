$(document).ready(function () {
    $('#male').click(function () { 
        $('#product-filter-state').html('')   
        $('#product-filter-state').html("Men's Products")   

});
$('#female').click(function () { 
    $('#product-filter-state').html('')   
    $('#product-filter-state').html("Ladies' Products")   

});
$('#kids').click(function () { 
    $('#product-filter-state').html('')   
    $('#product-filter-state').html("Children's Products")   

});
$('#reset').click(function () { 
    $('#product-filter-state').html('')   
    $('#product-filter-state').html("All Products")   

});
$('#wallet').click(function () { 
    $('.wallet').css('display','grid')
    $('.userinfo').css('display','none')   
});
$('#info').click(function () { 
    $('.wallet').css('display','none')
    $('.userinfo').css('display','block')   
});
$('#visa-span').click(function () { 
    $('#visa-details').css('display','flex')
    $('#bitcoin-details').css('display','none')  
    $('#card-details').css('display','none')   

});
$('#bitcoin-span').click(function () { 
    $('#visa-details').css('display','none')
    $('#bitcoin-details').css('display','block')  
    $('#card-details').css('display','none')   

});

    });
