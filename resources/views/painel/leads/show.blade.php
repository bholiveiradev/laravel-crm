@extends('layouts.painel')

@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fas fa-store bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ $title }}</h5>
                        <span>Detalhes do Lead</span>
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
                            Detalhes do Lead
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
                    <h3>Detalhes</h3>
                    <div class="ml-auto mr-0">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullwindowModal">
                            <i class="ik ik-check-square"></i> Converter em Cliente
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-data-label" data-toggle="tab" href="#nav-data"
                                role="tab" aria-controls="nav-data" aria-selected="true">Dados do Lead</a>
                            <a class="nav-item nav-link" id="nav-address-tab" data-toggle="tab" href="#nav-address"
                                role="tab" aria-controls="nav-address" aria-selected="false">Endereço</a>
                            <a class="nav-item nav-link" id="nav-calls-tab" data-toggle="tab" href="#nav-calls" role="tab"
                                aria-controls="nav-calls" aria-selected="false">Histórico de Contatos</a>
                            <a class="nav-item nav-link" id="nav-appointments-tab" data-toggle="tab"
                                href="#nav-appointments" role="tab" aria-controls="nav-appointments"
                                aria-selected="false">Compromissos</a>
                            <a class="nav-item nav-link" id="nav-other-tab" data-toggle="tab"
                                href="#nav-other" role="tab" aria-controls="nav-other"
                                aria-selected="false">Outros Detalhes</a>
                        </div>
                    </nav>
                    <div class="tab-content mt-20" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-data" role="tabpanel"
                            aria-labelledby="nav-data-label">
                            <div class="col-md-12">
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">CPF/CNPJ</dt>
                                    <dd class="col-md-10">{{ $lead->document }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Nome</dt>
                                    <dd class="col-md-10">{{ $lead->name }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Fantasia</dt>
                                    <dd class="col-md-10">{{ $lead->alias }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Telefone</dt>
                                    <dd class="col-md-10">{{ $lead->phone }}</dd>
                                </dl>
                                
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Celular</dt>
                                    <dd class="col-md-10">{{ $lead->celphone }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">E-mail</dt>
                                    <dd class="col-md-10">{{ $lead->email }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Site</dt>
                                    <dd class="col-md-10">{{ $lead->site }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab">
                            <div class="col-md-12">
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">CEP</dt>
                                    <dd class="col-md-10">{{ $lead->zipcode }}</dd>
                                </dl>
                            
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Endereço</dt>
                                    <dd class="col-md-10">{{ $lead->address }}</dd>
                                </dl>
                            
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Número</dt>
                                    <dd class="col-md-10">{{ $lead->number ?? 'S/N' }}</dd>
                                </dl>
                                
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Bairro</dt>
                                    <dd class="col-md-10">{{ $lead->district }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Compl</dt>
                                    <dd class="col-md-10">{{ $lead->complement }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Cidade</dt>
                                    <dd class="col-md-10">{{ $lead->city }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Estado</dt>
                                    <dd class="col-md-10">{{ $lead->state }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-calls" role="tabpanel" aria-labelledby="nav-calls-tab">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Adcionado por</th>
                                        <th>Comentários</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lead->contacts as $contact)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($contact->date)) }}</td>
                                        <td>{{ date('H:i', strtotime($contact->time)) }}</td>
                                        <td>{{ $contact->user->name }}</td>
                                        <td>{{ $contact->comments }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-appointments" role="tabpanel"
                            aria-labelledby="nav-appointments-tab">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Funcionário</th>
                                        <th>Descrição</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/01/2021</td>
                                        <td>09:00:35</td>
                                        <td>Thiago Brambila</td>
                                        <td>Lorem ipsum dolor sit amet, qui minim labore adipisicing ...</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#" class="text-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Editar lead"><i class="ik ik-edit-2"></i></a>
                                                <a href="#" class="btn-remove text-danger" data-toggle="tooltip"
                                                    data-placement="top" title="Remover lead"><i
                                                        class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                            <div class="col-md-12">
                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Origem</dt>
                                    <dd class="col-md-10">{{ $lead->source->title }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Status</dt>
                                    <dd class="col-md-10">
                                        <span class="badge badge-pill badge-{{ $lead->status->class }}">
                                            {{ $lead->status->title }}
                                        </span>
                                    </dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Filial</dt>
                                    <dd class="col-md-10">{{ $lead->branch->alias }}</dd>
                                </dl>

                                <dl class="row border-bottom">
                                    <dt class="col-md-2 mb-2">Comentários</dt>
                                    <dd class="col-md-10">{{ $lead->comments }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            var table = $('.datatable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
                },
                responsive: true,
                select: true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }]
            });
        });

    </script>
@endsection
