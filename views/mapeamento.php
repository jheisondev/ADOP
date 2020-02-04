
<div class="container text-center mt-5">
    <h3 class=" text-dark">
      Busca por cidade específica
    </h3>
    <p class="lead">
      Para filtrar as queixas de uma determinada cidade<br/>Basta preencher campo abaixo.
    </p>
    <hr class="my-2">
    <label class="text-center" for="formGroupExampleInput">Entre com a Cidade desejada!</label>
    
        <form class="form-inline text-center" id="form-filter">
            <div class="row mx-auto">
                <div class="form-group">
                    
                        <input type="text" class="form-control text-center" id="cidade" name="cidade" placeholder="Cidade" required>
                        
                        <button id="btn-filter" type="submit" class="btn btn-dark">Filtrar
                        </button>
                    
                </div>
                <div id="suggesstion-box"></div>
                    
                
            </div>    
        </form>
    
</div>
   
<hr class="my-3">

<div class="row-mapa mt-2">
    <div class="container-mapa" id="map"></div>
</div>       
<hr class="linha"/>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- CARREGA TODAS INFORMAÇÕES PARA O MAPA -->
<script 
  src="../js/mapa.js">
</script>


<!-- CHAMADA A API GOOGLE -->
<script 
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZag891e7zSznJqBt-dtFfYb2SuOML2dM&callback=initMap"
  async defer>
</script>
