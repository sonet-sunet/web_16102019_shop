$('.form').submit(function(e){
    e.preventDefault();

    let Mail = $(this).find("[name='mail']");  
    if( Mail.val() == '' ){
        
        Mail.addClass('error');
        
    }else{
        Mail.removeClass('error');
    }
});
    
$('.input').keyup(function(e){
    if($(this).val().length >= 2){
        $(this).removeClass('error');
    }
});