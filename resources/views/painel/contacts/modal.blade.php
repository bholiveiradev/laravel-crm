<div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
    aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Adicionar Contato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="formContact" action="{{ route('painel.contacts.store') }}" method="POST">
                @method('POST')
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center mt-4">
                        <label for="lead" class="col-md-1 text-md-right">Lead</label>
                        <div class="form-group col-md-6">
                            <select class="form-control select2" name="lead" style="width: 100%">
                                <option value="">-- Selecione uma opção --</option>
                                @foreach($leads as $lead)
                                    <option value="{{ $lead->id }}">{{ $lead->alias }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="date" class="col-md-1 text-md-right">
                            Data
                            <small class="d-block">dd/mm/aaaa</small>
                        </label>
                        <div class="form-group col-md-3">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <label for="time" class="col-md-1 text-md-right">
                            Hora
                            <small class="d-block">hh:mm</small>
                        </label>
                        <div class="form-group col-md-2">
                            <input type="time" class="form-control" name="time">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center align-items-start">
                        <label for="comments" class="col-md-1 text-md-right mt-2">Comentários</label>
                        <div class="form-group col-md-6">
                            <textarea class="form-control" name="comments" rows="5"></textarea>
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
