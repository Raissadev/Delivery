$('select').change(function(){
    if($(this).val() == 'dinheiro'){
        $('.troco').show();
        $('.cartao').hide();
    }else{
        $('.troco').hide();
        $('.cartao').show();

    }
})