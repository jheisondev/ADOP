$(document).ready(function(){

    // ativa função quando sair do campo CEP
    $("#cep").focusout(function(){
            // cep recebe valor do campo CEP
            var cep = $("#cep").val();
            // remove ' - ' do CEP
            cep = cep.replace("-", "");
            // url da requisição a WebService ViaCep
            var urlStr = "https://viacep.com.br/ws/"+ cep +"/json/";
            // requisição Ajax
            $.ajax({
                url : urlStr,
                type : "get",
                dataType : "json",
                // 
                success : function(data){
                    $("#cidade").val(data.localidade);
                    $("#uf").val(data.uf);
                    $("#bairro").val(data.bairro);
                    $("#rua").val(data.logradouro);
                },
                error : function(erro){
                swal({
                        title : "Ops!", 
                        text : 'CEP não encontrado, tente novamente', 
                        icon : "warning", 
                        button : "Fechar" , 
                    });
                    $('#cep').val("");
                }
            });
    });
});