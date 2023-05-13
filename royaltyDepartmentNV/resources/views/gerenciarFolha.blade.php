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
            @component('layouts._components.alert_sucess')
            @endcomponent
            @component('layouts._components.titulo_logo', ['titulo_imagem' => "FOLHA DE PAGAMENTO DE $upperMes"])
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'Administrativo')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'Financeiro')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'RH')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'Marketing')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'Comercial')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'Operacional')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'Vendas')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                    @for ($i = 0; $i < count($funcionarios_ativos); $i++)
                        <tbody>
                            <tr>
                                @if ($funcionarios_ativos[$i]['departamento'] == 'T.I')
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['nome'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $funcionarios_ativos[$i]['cargo'] }}</td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($funcionarios_ativos[$i]['salario'], 2, ',', '.') }}</td>
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
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($valor[0], 2, ',', '.') }}</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($valor[1], 2, ',', '.') }}</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($valor[2], 2, ',', '.') }}</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($valor[3], 2, ',', '.') }}</td>
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
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ 'R$ '.number_format($valor[4], 2, ',', '.') }}</td>
                        </tr>
                </table>
            </div>
            @component('layouts._components.voltar')
                {{ route('home') }}
            @endcomponent
        </main>
    </section>

@endsection
