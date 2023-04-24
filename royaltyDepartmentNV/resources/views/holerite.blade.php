@php
    $funcionario_nome = session('funcionario_nome', '');
    $title = "Holerite de " . $funcionario_nome;
@endphp

@extends('layouts.layout')

@section('content')

<section>
    <main>

        <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">

        <br><br>

        <div class="row">
            <h1 class="h3 my-5 fw-normal">{{ __('CONSULTA AO HOLERITE') }}</h1>
        </div>

        <span>Ordenar por mês e ano: </span>
        <div class="row mx-5">
            <div class="col-md-12">
            <form class="row tabela mt-3"method="GET" action="{{ route('holerite_consulta') }}">

            @csrf
            <div class="input-group mb-3">
                <select id="mes" name="mes" class="form-select" aria-label="Default select example">
                    <option value="" selected>Selecione um mês...</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('mes') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>

                <select id="ano" name="ano" class="form-select" aria-label="Default select example">
                    <option value="" selected>Selecione um ano...</option>
                    @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                        <option value="{{ $i }}" {{ old('ano') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>

                <button type="submit" class="btn btn-primary">{{ __('Consultar') }}</button>
            </div>
            </form>
            </div>
        </div>
        <br><br>

        @if(!empty($_GET['mes']) && !empty($_GET['ano']))
            <div class="row mb-2">
                <h4>Nome: {{ $funcionario_nome }}</h4>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        @foreach($holerites as $hol)
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 01</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->inss_fx1, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 02</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->inss_fx2, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 03</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->inss_fx3, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 04</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->inss_fx4, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Total</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->inss_total, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>

            <span><a href="https://www.in.gov.br/en/web/dou/-/portaria-interministerial-mtp/me-n-12-de-17-de-janeiro-de-2022-375006998" target="_blank">Fonte: Tabela INSS 2022 Oficial</a></span>

            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        @foreach($holerites as $hol)
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 01</td>
                                <td>R$ {{ number_format($hol->irrf_fx1, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 02</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->irrf_fx2, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 03</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->irrf_fx3, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 04</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->irrf_fx4, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 05</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->irrf_fx5, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Total</td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ {{ number_format($hol->irrf_total, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>

            <span><a href="https://www.gov.br/receitafederal/pt-br/assuntos/orientacao-tributaria/tributos/irpf-imposto-de-renda-pessoa-fisica#tabelas-de-incid-ncia-mensal" target="_blank">Fonte: Tabela IRRF 2022 Oficial</a></span>

            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success hole">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Vale Transporte</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ 220,00</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <span><a href="http://www.planalto.gov.br/ccivil_03/leis/l7418.htm" target="_blank">Fonte: Lei do Vale Transporte</a></span>

            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success hole">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Líquido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($holerites as $hol)
                            <tr>
                                <td>R$ {{ number_format($hol->salario_base, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($hol->salario_liquido, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <p>{{ __('Selecione os valores para o mês e ano e clique em consultar.') }}</p>

        @endif

        <br><br>

        <a href="/home"><img class="mt-3 voltar" src="{{ asset('images/SystemImages/voltar.png') }}" alt="voltar" title="Voltar"></a>

        <div class="row">
            <p>VOLTAR</p>
        </div>

    </main>
</section>

@endsection
