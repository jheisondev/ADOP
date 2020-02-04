$(document).ready(function(){
   
    var estado = $('#uf').val();
    var cidade = $('#cidade').val();
    var bairro = $('#cidade').val();
    var rua = $('#rua').val();
    var numero = $('#numero').val();
    var cep = $('#cep').val();
    
    var end = rua+","+numero+","+bairro+"-"+cidade+","+estado+","+cep;

    var api = "https://maps.googleapis.com/maps/api/geocode/json?address="+end+"&key=AIzaSyA0vIjSNtdHJqxX0Pn1QbXMw0ZQJaWQ8zs";
    $.get( api, function(data) {
         console.log(data);
    });
});