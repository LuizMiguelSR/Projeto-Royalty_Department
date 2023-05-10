@php
    $funcionario_nome = session('funcionario_nome', '');
@endphp

@extends('layouts.layout')

@section('titulo', "Holerite de $funcionario_nome")
@section('content')

    <section>
        <main>
            @component('layouts._components.titulo_logo', ['titulo_imagem' => "CONSULTA AO HOLERITE"])
            @endcomponent
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
                @isset($holerites[0]['inss_fx1'])
                    <div class="row tabela">
                        <table class="table-responsive-sm table-bordered border-success">
                            <thead>
                                @foreach($holerites as $hol)
                                    <div class="row mb-2">
                                        <h4>Nome: {{ $funcionario_nome }}</h4>
                                    </div>
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
                                    <tr>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Vale Transporte</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ 220,00</td>
                                    </tr>
                                @endforeach
                                @foreach($holerites as $hol)
                                    <thead>
                                        <tr>
                                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Líquido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>R$ {{ number_format($hol->salario_base, 2, ',', '.') }}</td>
                                            <td>R$ {{ number_format($hol->salario_liquido, 2, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                @endisset
                @if(!isset($holerites[0]['inss_fx1']))
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
