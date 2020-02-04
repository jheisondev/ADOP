$(function(){
    $('#form-contato').submit(function(){
        
        var dados = $('#form-contato').serializeArray();
        $.ajax({
            url: '../views/envia_email.php',
            type: 'POST',
            async: true,
            data: dados,
            cache: false,
            
            success: function(data){
                console.log(data);
                //sucesso    
                if (data == 1){
                    
                    swal({
                        title : "Bom trabalho!", 
                        text : "Email enviado com sucesso!", 
                        icon : "success", 
                        button : "Fechar" , 
                    });
                    $('#form-contato').trigger('reset');
                    
                //erro ao encontrar endereço
                }else{
                    swal({
                        title : "Ops! Ocorreu um erro ao enviar e-mail", 
                        text : "Tente novamente ou contate o Administrador manualmente pelo endereço adop.tech@hotmail.com", 
                        icon : "warning", 
                        button : "Fechar" , 
                    });
                }
                $('#botao').removeAttr('disabled');        
            }, 
            beforeSend : function(){
                $('#botao').attr('disabled', 'disabled');
            }
        });
        return false;
    });
});