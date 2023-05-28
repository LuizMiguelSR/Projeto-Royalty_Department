@extends('layouts.layout')
@section('titulo', 'Gerenciar Holerites')
@section('content')
    <section>
        <main>
            @component('layouts._components.alert_error')
            @endcomponent
            @component('layouts._components.alert_sucess')
            @endcomponent
            @component('layouts._components.titulo_logo', ['titulo_imagem' => "GERENCIAR HOLERITES DE $mesAtualUpper"])
            @endcomponent
                <div class="col-md-12">
                    <form class="row tabela mb-3" action="{{ route('gerenciar_holerite.consulta') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Filtrar por nome" name="nome_funcionario" value="{{ request()->input('nome_funcionario') }}">
                            <select class="form-select" aria-label="Default select example" name='departamento' onchange="this.form.submit()">
                                <option value="">Listar Todos Colaboradores</option>
                                <option value="Administrativo" {{ request()->input('options_dp') == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                                <option value="Financeiro" {{ request()->input('options_dp') == 'Financeiro' ? 'selected' : '' }}>Financeiro</option>
                                <option value="RH" {{ request()->input('options_dp') == 'RH' ? 'selected' : '' }}>RH</option>
                                <option value="Comercial" {{ request()->input('options_dp') == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                <option value="Operacional" {{ request()->input('options_dp') == 'Operacional' ? 'selected' : '' }}>Operacional</option>
                                <option value="Vendas" {{ request()->input('options_dp') == 'Vendas' ? 'selected' : '' }}>Vendas</option>
                                <option value="T.I" {{ request()->input('options_dp') == 'T.I' ? 'selected' : '' }}>TI</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Filtrar</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    @if ($funcionarios->count() > 0)
                    <div class="row tabela">
                        <table class="table-responsive-sm table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Departamento</th>
                                    <th>Registrar</th>
                                    <th>Visualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($funcionarios as $funcionario)
                                    @if ($funcionario->status === 'ativado')
                                        <tr>
                                            <td>{{ $funcionario->nome_funcionario }}</td>
                                            <td>{{ $funcionario->departamento->departamento_nome }}</td>
                                            <td>
                                                <button type="submit" class='btn btn-sm btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModal{{ $funcionario->id }}" title="Registrar Holerite do mês de {{ $mesAtualUpper }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{ route('holerite_consulta_id', $funcionario->id)}}" method="get">
                                                    <button type="submit" class='btn btn-sm btn-primary' value="{{ $funcionario->id }}" title="Visualizar Holerite">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-person-fill" viewBox="0 0 16 16">
                                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal de confirmação -->
                                        <div class="modal fade" id="exampleModal{{ $funcionario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered justify-content-center">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmação!</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Deseja registrar o holerite do mês de {{ $mesAtualUpper }} referente ao funcionário {{ $funcionario->nome_funcionario }}</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                        <form action="{{ route('gerenciar_holerites.show', $funcionario->id)}}" method="get">
                                                            <button type="submit" class="btn btn-primary">Sim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal2{{ $funcionario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered justify-content-center">
                                                <div class="modal-content">

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p>{{ __('Verifique se valores para nome está correto e clique em filtrar.') }}</p>
                    @endif
                </div>
                @if ($funcionariosPage->lastPage() > 1)
                    <nav>
                        <ul class="pagination justify-content-center mt-5">
                            <li class="page-item {{ ($funcionariosPage->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $funcionariosPage->url(1) }}">{{ __('Primeira') }}</a>
                            </li>
                            @for ($i = 1; $i <= $funcionariosPage->lastPage(); $i++)
                                <li class="page-item {{ ($funcionariosPage->currentPage() == $i) ? ' active' : '' }}" style="color: #0b6567">
                                    <a class="page-link" href="{{ $funcionariosPage->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ ($funcionariosPage->currentPage() == $funcionariosPage->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $funcionariosPage->url($funcionariosPage->currentPage()+1) }}">{{ __('Próxima') }}</a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
            @component('layouts._components.voltar')
                {{ route('home') }}
            @endcomponent
        </main>
    </section>
@endsection
