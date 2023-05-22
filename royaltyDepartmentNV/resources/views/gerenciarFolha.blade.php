@php
    use Carbon\Carbon;
    $data = Carbon::now();
    $mes = $data->locale('pt_BR')->isoFormat('MMMM');
    $upperMes = strtoupper($mes);
@endphp
@extends('layouts.layout')
@section('titulo', 'Gerenciar Folha de Pagamento')
@section('content')
    <section>
        <main>
            @component('layouts._components.alert_error')
            @endcomponent
            @component('layouts._components.alert_sucess')
            @endcomponent
            @component('layouts._components.titulo_logo', ['titulo_imagem' => "CONSULTA A FOLHA DE PAGAMENTO"])
            @endcomponent
            <a href="{{ route('gerenciar_folha.create') }}"><img class="novo-funcionario my-5" alt="Cadastrar" src="{{ asset('images/SystemImages/nova_folha.png') }}"/>Registrar Folha de Pagamento</a><br><br>
            @component('layouts._components.select_mes_ano')
                {{ route('gerenciar_folha_consulta') }}
            @endcomponent
            @if(!empty($_GET['data_hora_inicio']))
                @isset($folhas[0]['data_folha'])
                @php
                    $componentes = explode("-", $folhas[0]['data_folha']);
                    $ano = $componentes[0];
                    $mes = $componentes[1];
                @endphp
                @component('layouts._components.titulo', ['titulo_imagem' => "FOLHA DE PAGAMENTO MÊS: $mes ANO: $ano"])
                @endcomponent
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Administrativo') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'Administrativo')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Financeiro') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'Financeiro')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Recursos Humanos') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'RH')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Marketing') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'Marketing')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Comercial') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'Comercial')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Operacional') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'Operacional')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Vendas') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'Vendas')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row">
                    <h1 class="h3 my-2 fw-normal">{{ __('Tecnologia da Informação') }}</h1>
                </div>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome Colaborador</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Salário Base</th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < count($folhas); $i++)
                            <tbody>
                                <tr>
                                    @if ($folhas[$i]['departamento_nome'] == 'T.I')
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['nome_funcionario'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $folhas[$i]['cargo'] }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[$i]['salario_base'], 2, ',', '.') }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        @endfor
                    </table>
                </div><br>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">FGTS</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sist. S</th>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">RAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[0]['fgts'], 2, ',', '.') }}</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[0]['inss'], 2, ',', '.') }}</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[0]['sistema_s'], 2, ',', '.') }}</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[0]['rat'], 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div><br>
                <div class="row tabela">
                    <table class="table-responsive-sm table-bordered border-success">
                        <thead>
                            <tr>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Total da Folha de pagamento</th>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($folhas[0]['total'], 2, ',', '.') }}</td>
                            </tr>
                    </table>
                </div>
            @endisset
                @if(!isset($folhas[0]['data_folha']))
                    <p>{{ __('Não constam registros neste mês ou ano.') }}</p>
                @endif
            @else
                <p>{{ __('Selecione os valores para o mês e ano e clique em consultar.') }}</p>
            @endif
            @component('layouts._components.voltar')
                {{ route('home') }}
            @endcomponent
        </main>
    </section>
@endsection
