@php
    $funcionario_nome = session('funcionario_nome', '');
@endphp

@extends('layouts.layout')

@section('titulo', "Folha de Ponto de $funcionario_nome")
@section('content')

    <section>
        <main>
            @component('layouts._components.titulo_logo', ['titulo_imagem' => 'CONSULTA A FOLHA DE PONTO'])
            @endcomponent
            <span>Ordenar por mês e ano: </span>
            <form class="row tabela mt-2"method="GET" action="{{ route('folha_ponto_consulta') }}">
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
            @if(!empty($_GET['mes']) && !empty($_GET['ano']))
                @isset($folha[0]['diames'])
                    <div class="row tabela">
                        <table class="table-responsive-sm table-bordered border-success">
                            <thead>
                                <tr>
                                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Data</th>
                                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Entrada</th>
                                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Intervalo Ida</th>
                                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Intervalo Volta</th>
                                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Saída</th>
                                </tr>
                            </thead>
                            @foreach($folha as $fol)
                                <tbody>
                                    <tr>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ date('d/m/Y', strtotime($fol->diames)) }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $fol->entrada }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $fol->almoco_sai }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $fol->almoco_che }}</td>
                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $fol->saida }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @endisset
                @if(!isset($folha[0]['diames']))
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
