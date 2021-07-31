<div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
    aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Adicionar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="formCustomer">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Dados do Cliente
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="document" class="col-md-2 text-md-right">CPF / CNPJ</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="document">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="name" class="col-md-2 text-md-right">Nome <small class="d-block">ou razão social</small></label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="company_name" class="col-md-2 text-md-right">Fantasia <small class="d-block">ou apelido</small></label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="company_name">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="phone" class="col-md-2 text-md-right">Telefone</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="celphone" class="col-md-2 text-md-right">Celular <small class="d-block">(opcional)</small></label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="celphone">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="email" class="col-md-2 text-md-right">Email</label>
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="website" class="col-md-2 text-md-right">Site <small class="d-block">(opcional)</small></label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="website">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Endereço
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="zipcode" class="col-md-2 text-md-right">CEP <small class="d-block">(opcional)</small></label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="zipcode">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="address" class="col-md-2 text-md-right">Endereço</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="number" class="col-md-2 text-md-right">Número</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="number">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="district" class="col-md-2 text-md-right">Bairro</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="district">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="addon_address" class="col-md-2 text-md-right">Compl <small class="d-block">(opcional)</small></label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="addon_address">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="city" class="col-md-2 text-md-right">Cidade</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="state" class="col-md-2 text-md-right">Estado</label>
                                        <div class="form-group col-md-6">
                                            <select class="form-control select2" name="state" style="width: 100%">
                                                <option value="">-- Selecione uma opção --</option>
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
                                                <option value="EX">Estrangeiro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Detalhes do Cliente
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="source" class="col-md-2 text-md-right">Origem</label>
                                        <div class="form-group col-md-6">
                                            <select class="form-control select2" name="source" style="width: 100%" disabled>
                                                <option value="1">Google</option>
                                                <option value="2">Facebook</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="status" class="col-md-2 text-md-right">Status</label>
                                        <div class="form-group col-md-6">
                                            <select class="form-control select2" name="status" style="width: 100%">
                                                <option value="1">Novo</option>
                                                <option value="2">Em negociação</option>
                                                <option value="3">Fechado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <label for="branch" class="col-md-2 text-md-right">Filial</label>
                                        <div class="form-group col-md-6">
                                            <select class="form-control select2" name="branch" style="width: 100%">
                                                <option value="1">Birigui</option>
                                                <option value="2">Campinas</option>
                                                <option value="3">Santos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-start">
                                        <label for="comments" class="col-md-2 text-md-right mt-2">Comentários <small class="d-block">(opcional)</small></label>
                                        <div class="form-group col-md-6">
                                            <textarea class="form-control" name="comments"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Fechar
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
