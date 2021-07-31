<div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
    aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Adicionar Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="formStatus" action="{{ route('painel.status.store') }}" method="POST">

                @method('POST')

                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center mt-4">
                        <label for="title" class="col-md-1 text-md-right">Título</label>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="type" class="col-md-1 text-md-right">Para</label>
                        <div class="form-group col-md-6">
                            <select name="type" class="form-control select2" style="width: 100%">
                                <option value="lead">Lead</option>
                                <option value="customer">Cliente</option>
                            </select>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <label for="class" class="col-md-1 text-md-right">Classe <small
                                class="d-block">(cor)</small></label>
                        <div class="form-group col-md-6">
                            <select name="class" class="form-control select2" style="width: 100%">
                                <option value="primary">primary</option>
                                <option value="success">success</option>
                                <option value="danger">danger</option>
                                <option value="info">info</option>
                                <option value="warning">warning</option>
                                <option value="light">light</option>
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
