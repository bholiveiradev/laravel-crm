@extends('layouts.painel')

@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fas fa-store bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ $title }}</h5>
                        <span>Gerenciar Compromissos</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('painel.dashboard.index') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('painel.leads.index') }}">Leads</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Gerenciar Compromissos
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Compromissos</h3>
                    <div class="ml-auto mr-0">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullwindowModal">
                            <i class="ik ik-plus"></i>Adicionar
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Lead</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Funcionário</th>
                                <th class="nosort" style="width:55px;">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mentora Soluções Ltda. Me</td>
                                <td>01/01/2021</td>
                                <td>09:00:35</td>
                                <td>Thiago Brambila</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" class="text-primary" data-toggle="tooltip" data-placement="top"
                                            title="Editar lead"><i class="ik ik-edit-2"></i></a>
                                        <a href="#" class="btn-remove text-danger" data-toggle="tooltip"
                                            data-placement="top" title="Remover lead"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog"
        aria-labelledby="fullwindowModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullwindowModalLabel">Adicionar Compromisso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form id="formCall">
                    @csrf
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center align-items-center mt-4">
                            <label for="lead" class="col-md-1 text-md-right">Lead</label>
                            <div class="form-group col-md-6">
                                <select class="form-control select2" name="lead" style="width: 100%">
                                    <option value="">-- Selecione uma opção --</option>
                                    <option value="1">Mentora Soluções</option>
                                    <option value="2">Magrella Natural</option>
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
                        <div class="row d-flex justify-content-center align-items-center">
                            <label for="eployee" class="col-md-1 text-md-right">Funcionário</label>
                            <div class="form-group col-md-6">
                                <select class="form-control select2" name="eployee" style="width: 100%">
                                    <option value="">-- Selecione uma opção --</option>
                                    <option value="1">Thiago Brambila</option>
                                    <option value="2">Bruno Oliveira</option>
                                </select>
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
@endsection

@section('js')
    <script>
        $(function() {
            $('.btn-remove').on('click', function() {
                event.preventDefault();

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Esta ação não poderá ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    reverseButtons: true,
                    cancelButtonText: 'Não, feche para mim',
                    confirmButtonText: 'Sim, remover!',
                    cancelButtonClass: 'btn btn-primary btn-lg py-2',
                    confirmButtonClass: 'btn btn-danger btn-lg py-2 ml-2',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            position: 'top-end',
                            title: 'Removido!',
                            text: 'O registro foi removido com sucesso.',
                            icon: 'success',
                            toast: true,
                            timer: 5000
                        })
                    }
                })
            });

            $('#formCall').on('submit', function() {
                event.preventDefault();

                $(this).find('button').attr('disabled', true);

                $(this).find('button[type=submit]')
                    .addClass('d-flex')
                    .html('<span class="spinner-border spinner-border-sm mr-2"></span> Salvando...');

                // Fazer chamada ajax para salvar os dados
                $('#fullwindowModal').modal('hide');

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Tudo OK!',
                    text: 'Registro salvo com sucesso!',
                    toast: true,
                    timer: 5000
                });

                $(this).trigger('reset')
                    .find('button').attr('disabled', false)

                $(this).find('button[type=submit]')
                    .html('<i class="fas fa-save"></i> Salvar');
            });

            $('#fullwindowModal').on('show.bs.modal', function() {
                $('#formCall').trigger('reset');
            });
        });

    </script>
@endsection
