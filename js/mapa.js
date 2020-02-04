//AUTO COMPLETA CIDADE
$(document).ready(function() {
 
    // Captura o retorno do retornaCliente.php
    $.getJSON('../views/buscando.php', function(data){
        var dados = [];
         
        // Armazena na array capturando somente o nome do cliente
        $(data).each(function(key, value) {
        dados.push(value.nome_municipio);
        });
         
        // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
        $('#cidade').autocomplete({ source: dados, minLength: 4});
    });
});
    
$(function(){
  $('#form-filter').submit(function(e){
      
      var cidade = $("#cidade").val();
      e.preventDefault(); // para a ação de submit  
        // requisição Ajax
        $.ajax({
          url : "../views/filtra_cidade.php",
          data: {cidade : cidade},
          type : "POST",
          dataType : "json",
          
          success : function(data){
            $('#form-filter').trigger('reset');
            if (data.success) {
              console.table(data);
              let lat = data.dados.latitude; // sua nova latitude
              let long = data.dados.longitude; // sua nova longitude
              initMap(lat, long); // aqui vc pode invoca-la novamente
              console.info(lat, long);
            } else {
              console.error(data.msg);
              swal({
                title : "Ops!", 
                text : "Cidade não encontrada!", 
                icon : "info",
                timer: 2000, 
                button : "Fechar" , 
              });
            }
            $('#btn-filter').removeAttr('disabled'); 
          },

          beforeSend: function(){
            $('#btn-filter').attr('disabled', 'disabled');
            $(".bg_load").fadeOut("slow");
            $(".wrapper").fadeOut("slow");
          },

          error : function(erro){
            console.log(erro.msg + '\n');
            swal({
              title : "Ops!", 
              text : "Erro ao buscar Cidade!", 
              icon : "error",
              timer: 2000, 
              button : "Fechar" , 
            });
            $('#form-filter').trigger('reset');
          }
        });
  });
});

    // -------- MAPA
    function initMap(lat, lng) { // tipo isso te falei na msg 

      // Ae vc muda a lat e long pra cá
      if (lat == undefined && lng == undefined ) {
        var lat = "-20.873597";
        var lng ="-45.518563";
      }

      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(lat, lng),
        zoom: 10
      });

      var infoWindow = new google.maps.InfoWindow;
      downloadUrl('../views/baseXml.php', function(data) {
          console.log(data);
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        var icone;
        Array.prototype.forEach.call(markers, function(markerElem) {
          
          var Cidade    = markerElem.getAttribute('Cidade');
          var Estado    = markerElem.getAttribute('Estado');
          var Bairro    = markerElem.getAttribute('Bairro');
          var Rua       = markerElem.getAttribute('Rua');
          var Numero    = markerElem.getAttribute('Numero');
          var Tipo      = markerElem.getAttribute('Tipo');
          var Descricao = markerElem.getAttribute('Descricao');
          var Data      = markerElem.getAttribute('Data');
          
          switch (Tipo) {

            case 'Iluminação pública':
              icone = url="../img/icones/marcadores/luz.png";//icone; 
              break;
            
            case 'Saneamento':
              icone = url="../img/icones/marcadores/saneamento.png";//icone; 
              break;

            case 'Pavimentação':
              icone = url="../img/icones/marcadores/pavimentacao.png";//icone; 
              break; 

            case 'Limpeza urbana':
              icone = url="../img/icones/marcadores/limpeza.png";//icone;  
              break;   

            case "Sinalização":
              icone = url="../img/icones/marcadores/sinalizacao.png";//icone;
              break; 

            case "Poluição visual e sonora":
              icone = url="../img/icones/marcadores/pvs.png";//icone;
              break; 

            case "Hospital":
              icone = url="../img/icones/marcadores/hospital.png";//icone;
              break;    

            case "Postos de saúde e Upas":
              icone = url="../img/icones/marcadores/ps.png";//icone;
              break;   

            case "Escolas":
              icone = url="../img/icones/marcadores/school.png";//icone;
              break;  

            case "Praças":
              icone = url="../img/icones/marcadores/praca.png";//icone;
              break;   

            case "Transporte público":
              icone = url="../img/icones/marcadores/bus.png";//icone;
              break;

            case "Segurança":
              icone = url="../img/icones/marcadores/seguranca.png";//icone;
              break;

            case "Enchentes e desmoronamento":
              icone = url="../img/icones/marcadores/ed.png";//icone;
              break;
              
            case "Acessibilidade":
              icone = url="../img/icones/marcadores/acessibilidade.png";//icone;
              break;

            case "Esporte e Lazer":
              icone = url="../img/icones/marcadores/el.png";//icone;
              break;

            default:
              icone = url="../img/icones/marcadores/outro.png";//icone; 
              break;
          }

          var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

          var infowincontent = '<div class="text content-justify-center" id="informacoesMarcador">'
                                +'<strong>'+Cidade+'-'+Estado+'</strong><br/>'
                                +''+Rua+', '+Numero+'<br/>'
                                +''+Bairro+'<br/>'
                                +'<hr><div class="text text-center">Reclamação</div> <br/>'
                                +'Tipo:<strong>'+' '+Tipo+'</strong><br/>'
                                +'Descrição:<div class="text text-center"><strong>'+' '+Descricao+'</strong></div><br/>'
                                +'<div class="text text-center">'+Data+'</div><br/>'
                                +'</div>';

          var marker = new google.maps.Marker({
            map: map,
            position: point,
            animation: google.maps.Animation.DROP,
            icon: icone,
            
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
          });
        });
      });
    }

  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

  function doNothing() {}
