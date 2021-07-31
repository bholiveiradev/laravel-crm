@extends('layouts.painel')

@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fas fa-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ $title }}</h5>
                        <span>Gerenciamento de Clientes</span>
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
                            <a href="{{ route('painel.customers.index') }}">Clientes</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lista de Clientes
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
                    <h3>Clientes</h3>
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
                                <th>Nome</th>
                                <th>Fantasia</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Status</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mentora Soluções Ltda. Me</td>
                                <td>Mentora Soluções</td>
                                <td>erich@example.com</td>
                                <td>(13) 9 9665-7883</td>
                                <td>
                                    <span class="badge badge-pill badge-success">
                                        Novo
                                    </span>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" class="text-secondary"
                                            data-toggle="tooltip" data-placement="top" title="Detalhes"><i
                                                class="ik ik-eye"></i></a>
                                        <a href="#" class="text-primary" data-toggle="tooltip" data-placement="top"
                                            title="Editar cliente"><i class="ik ik-edit-2"></i></a>
                                        <a href="#" class="btn-remove text-danger" data-toggle="tooltip"
                                            data-placement="top" title="Remover cliente"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('painel.customers.modal')

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

            $('#formCustomer').on('submit', function() {
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

                // Recarregar dados ajax após salvar
                // table.ajax.reload();

                $(this).trigger('reset')
                    .find('button').attr('disabled', false)

                $(this).find('button[type=submit]')
                    .html('<i class="fas fa-save"></i> Salvar');
            });

            $('#fullwindowModal').on('hide.bs.modal', function() {
                $('#formCustomer').trigger('reset');
            });
        });

    </script>
@endsection
