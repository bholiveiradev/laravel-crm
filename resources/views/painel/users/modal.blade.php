<div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
    aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Adicionar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="formUser" action="{{ route('painel.users.store') }}" method="POST">
                
                @method('POST')

                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center mt-4">
                        <label for="name" class="col-md-1 text-md-right">Nome</label>
                        <div class="form-group col-md-6">
                           <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="celphone" class="col-md-1 text-md-right">Celular</label>
                        <div class="form-group col-md-6">
                           <input type="text" class="form-control" name="celphone">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="email" class="col-md-1 text-md-right">E-mail</label>
                        <div class="form-group col-md-6">
                           <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="password" class="col-md-1 text-md-right">Senha</label>
                        <div class="form-group col-md-6">
                           <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="password_confirmation" class="col-md-1 text-md-right">Repetir Senha</label>
                        <div class="form-group col-md-6">
                           <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="branch" class="col-md-1 text-md-right">Filial</label>
                        <div class="form-group col-md-6">
                           <select name="branch" class="form-control select2" style="width: 100%">
                               <option value="">-- Selecione uma filial --</option>
                               @foreach($branches as $branch)
                               <option value="{{ $branch->id }}">{{ $branch->alias }}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="admin" class="col-md-1 text-md-right">Administrador</label>
                        <div class="form-group col-md-6">
                           <select name="admin" class="form-control select2" style="width: 100%">
                               <option value="0">Não</option>
                               <option value="1">Sim</option>
                           </select>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="super" class="col-md-1 text-md-right">Super Usuário <small class="d-block">(irrestrito)</small></label>
                        <div class="form-group col-md-6">
                           <select name="super" class="form-control select2" style="width: 100%">
                               <option value="0">Não</option>
                               <option value="1">Sim</option>
                           </select>
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
