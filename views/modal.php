
    <!-- Modal -->
    <div class="modal fade" id="formulario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog text-center" role="document">
            <div class="modal-content text-dark">
                <!-- Cabeçalho -->
                <div class="modal-header mx-auto">
                    <h5 class="modal-title" id="titleModal">Formulário de Queixas</h5>
                </div>
                <p class="text text-info">Informe dados referentes ao local da queixa!</p>
                <p class="text"><strong>ATENÇÃO</strong>
                para que seja feito mapeamento corretamente, é de suma importância que todos campos sejam informados o mais precisamente possível!
                </p>
                <!-- Conteúdo -->
                <div class="modal-body">
                    <!-- FORM -->
                    <form class="was-validated" id="form-dados">
                        <div class="form-row">
                            <div class="col-12">
                                <label>Nome</label>
                            <input id="nome" name="nome" type="text" class="form-control"  placeholder="Nome Completo" required>
                                
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label>CEP</label>
                                <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP" required>
                                
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label>Cidade</label>
                                <input id="cidade" name="cidade" type="text" class="form-control"  placeholder="Cidade" required>
                                
                            </div>

                            <div class="col-sm-6">
                                <label>Bairro</label>
                                <input id="bairro" name="bairro" type="text" class="form-control"  placeholder="Bairro" required>
                               
                            </div>

                            <div class="col-sm-6">
                                <label>UF</label>
                                <select id="uf" name="uf" class="custom-select" required>
                                    <option value="">Opções</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                               
                            </div>

                            <div class="col-sm-12 col-md-9">
                                <label>Rua</label>
                                <input id="rua" name="rua" type="text" class="form-control"  placeholder="Rua" required>
                                
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <label>Número</label>
                                <input id="numero" name="numero" type="number" class="form-control"  placeholder="Número" required>
                              
                                
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <label>Tipo</label>
                                <select id="tipo" name="tipo" class="custom-select" required>
                                    <option value="">Opções</option>
                                    <option value="Iluminação pública">Iluminação pública</option>
                                    <option value="Saneamento">Saneamento</option>
                                    <option value="Pavimentação">Pavimentação</option>
                                    <option value="Limpeza urbana">Limpeza urbana</option>
                                    <option value="Sinalização">Sinalização</option>
                                    <option value="Poluição visual e sonora">Poluição visual e sonora</option>
                                    <option value="Hospital">Hospital</option>
                                    <option value="Esporte e Lazer">Esporte e Lazer</option>
                                    <option value="Acessibilidade">Acessibilidade</option>
                                    <option value="Postos de saúde e Upas">Postos de saúde e Upas</option>
                                    <option value="Escolas">Escolas</option>
                                    <option value="Praças">Praças</option>
                                    <option value="Transporte público">Transporte público</option>
                                    <option value="Segurança">Segurança</option>
                                    <option value="Enchentes e desmoronamento">Enchentes e desmoronamento</option>
                                    <option value="Indefinido">Outros</option>
                                </select>
                                
                            </div>
                            
                            <div class="col-12">
                                <label>Descrição</label>
                                <textarea id="descricao" name="descricao" type="text" class="form-control" rows="3" placeholder="Breve descrição.." required></textarea>
                                
                            </div>

                        </div>
                        <hr class="linha">
                        <button id="botao_criar" type="submit" class="btn btn-outline-success">Criar</button>
                        <button  class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="../js/viaCep.js"></script>
<script src="../js/gravar-queixa.js"></script>
