<div class="container text-center mb-4 mt-5">
    <h1 class=" text-dark">
        Contato
    </h1>
    <p class="lead">
        Deixe sua sugestão ou crítica quanto a aplicação.
    </p>
    <hr class="my-2">
    <p>Área de contato também poderá ser usada para expressar interesse na base de dados.</p>
</div>

<div class="container mt-0 mb-5 col-xs-12 col-sm-10 col-md-8 col-lg-6">
    <form class="was-validated" id="form-contato">
        <div class="card">
            <!-- Card -->
            <div class="card-body p-2">

                <div class="form-group mb-0">
                    <label for="nome">Nome</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
                        <div class="invalid-feedback text-center"></div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="exemplo@email.com" required>
                        <div class="invalid-feedback text-center"></div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="mendagem">Mensagem</label>
                    <div class="input-group">
                        <textarea class="form-control" id="mensagem" placeholder="mensagem" name="mensagem" rows="4" required></textarea>
                        <div class="invalid-feedback text-center"></div>
                    </div>
                </div>

                <div class="text-center">
                    <button id="botao" type="submit" value="Enviar" class="btn btn-info btn-block py-2">Enviar</button>
                </div>
            </div>
        </div>
    </form>          
</div>
         

<hr class="linha"/>
<script src="../js/envia_email.js"></script>