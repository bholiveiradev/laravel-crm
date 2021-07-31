@extends('layouts.painel')

@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fas fa-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ $title }}</h5>
                        <span>Gerenciamento de Status (leads e clientes)</span>
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
                            <a href="{{ route('painel.status.index') }}">Status</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lista de Status
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
                    <h3>Status</h3>
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
                                <th>Título</th>
                                <th>Para</th>
                                <th class="nosort" style="width: 10%">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $status)
                                <tr>
                                    <td>{{ $status->title }}</td>
                                    <td>{{ __(ucfirst($status->type)) }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('painel.status.edit', $status) }}"
                                                data-update-action="{{ route('painel.status.update', $status) }}"
                                                class="btn-edit text-primary" data-toggle="tooltip" data-placement="top"
                                                title="Editar status"><i class="ik ik-edit-2"></i></a>
                                            <a href="{{ route('painel.status.destroy', $status) }}" class="btn-remove text-danger"
                                                data-toggle="tooltip" data-placement="top" title="Remover status"><i
                                                    class="ik ik-trash-2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('painel.status.modal')

@endsection

@section('js')
    <script>
        $(function() {
            // Abre o form com os dados para editar
            $('.btn-edit').on('click', function() {
                event.preventDefault();

                $.ajax({
                    method: 'GET',
                    url: $(this).attr('href'),
                    success: function(result) {
                        $('#fullwindowModalLabel').text('Editar Status');

                        $('input[name=title]').val(result.title);
                        $('select[name=type]').val(result.type).change();
                        $('select[name=class]').val(result.class).change();
                    }
                });

                $('#formStatus').attr('action', $(this).data('update-action'))
                    .find('input[name=_method]').val('PUT');

                $('#fullwindowModal').modal('show');
            });

            // Remove os dados com confirmação
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

                        $.ajax({
                            method: 'DELETE',
                            url: $(this).attr('href'),
                            error: function(result) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro!',
                                    text: result.responseJSON.message,
                                    timerProgressBar: true,
                                    timer: 3000,
                                });
                            },
                            success: function(result) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Tudo OK!',
                                    text: 'Registro removido com sucesso!',
                                    timerProgressBar: true,
                                    timer: 3000,
                                    onClose: function() {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    }
                })
            });

            // Submit do formulário de cadastro e edição
            $('#formStatus').on('submit', function() {
                event.preventDefault();

                $(this).find('button').attr('disabled', true);

                $(this).find('button[type=submit]')
                    .addClass('d-flex')
                    .html('<span class="spinner-border spinner-border-sm mr-2"></span> Salvando...');

                // Fazer chamada ajax para salvar os dados
                let formData = new FormData($(this)[0]);

                $.ajax({
                    type: $(this).find('input[name=_method]').val(),
                    method: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(result) {
                        $("#errors-container").alert('close');
                        $('.is-invalid').removeClass('is-invalid');

                        $('.modal-body')
                            .prepend(`<div id="errors-container" class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4><i class="fas fa-exclamation-circle"></i> Atenção</h4>
                                    </div>`);

                        $.each(result.responseJSON.errors, function(key, value) {

                            $('[name=' + key + ']').addClass('is-invalid');

                            $('<li class="font-weight-bold">' + value + '</li>')
                                .appendTo('#errors-container');
                        });
                    },
                    success: function(result) {
                        $('#fullwindowModal').modal('hide');

                        Swal.fire({
                            icon: 'success',
                            title: 'Tudo OK!',
                            text: 'Registro salvo com sucesso!',
                            timerProgressBar: true,
                            timer: 3000,
                            onClose: function() {
                                location.reload();
                            }
                        });
                    }
                });

                $(this).find('button').attr('disabled', false)

                $(this).find('button[type=submit]')
                    .html('<i class="fas fa-save"></i> Salvar');
            });

            $('#fullwindowModal').on('hide.bs.modal', function() {
                $('#fullwindowModalLabel').text('Adicionar Status');

                $('#formStatus').trigger('reset')
                    .attr('action', "{{ route('painel.status.store') }}")
                    .find('.is-invalid').removeClass('is-invalid');

                $('input[name=_method]').val('POST');
                
                $('select[name=type]').val('lead').change();
                $('select[name=class]').val('primary').change();

                $("#errors-container").alert('close');
            });
        });

    </script>
@endsection
