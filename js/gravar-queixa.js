
$(function(){
    $('#form-dados').submit(function(){
        
        var dados = $('#form-dados').serializeArray();
        $.ajax({
            url: "../views/ajax_gravar.php",
            type: "POST",
            data: dados,
            cache: false,
            
            success: function(data){
                console.log(data);
                //sucesso    
                if (data == 10){
                    
                    swal({
                        title : "Bom trabalho!", 
                        text : "Queixa registrada com sucesso! Na página de MAPEAMENTO é possível observar pontos já marcados no Mapa! Participe da pesquisa de uso clicando no botão vermelho 'Feedback' no canto inferior direito!", 
                        icon : "success", 
                        button : "Fechar" , 
                    });
                    $('#form-dados').trigger('reset');
                    $('.modal').modal('hide');
                    $('#botao_criar').removeAttr('disabled'); 

                //erro ao encontrar endereço
                }if(data == 12){
                    swal({
                        title : "Ops!", 
                        text : "Endereço não encontrado!", 
                        icon : "warning", 
                        button : "Fechar" , 
                    });
                    $('#botao_criar').removeAttr('disabled'); 
                //erro ao gravar no banco    
                }if (data == 14) {
                    swal({
                        title : "Ops!", 
                        text : "Erro ao salvar informações!", 
                        icon : "error", 
                        button : "Fechar" , 
                    });
                    $('#botao_criar').removeAttr('disabled'); 
                }   
                  
            },
            beforeSend: function(){
                $('#botao_criar').attr('disabled', 'disabled');
            }
        });
        return false;
    });
    
});
