@php
    $title = "Registro de Ponto de ".Auth::user()->funcionario->nome_funcionario;
@endphp

@extends('layouts.layoutClock')

@section('content')

    <section>
        <script>
            function showtime(){
                setTimeout("showtime();",1000);

                callerdate.setTime(callerdate.getTime()+1000);
                var hh = String(callerdate.getHours());
                var mm = String(callerdate.getMinutes());
                var ss = String(callerdate.getSeconds());

                document.getElementById("face").innerHTML =
                ((hh < 10) ? " " : "") + hh +
                ((mm < 10) ? ":0" : ":") + mm +
                ((ss < 10) ? ":0" : ":") + ss;
            }
            callerdate=new Date(<?php date("Y,m,d,H,i,s");?>);
        </script>

        <main>

            <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">

            <br><br>

            <div class="row">
                <h1 class="h3 my-5 fw-normal">{{ __('REGISTRE SUA ENTRADA') }}</h1>
            </div>

            <form action="{{ route('funcionario_registra_ponto') }}" method="POST">
                <div class="row mt-5">
                    <main class="form-add w-100 m-auto">
                        <div class="container1">
                            <div class="clock" id="face"></div>
                        </div>
                    </main>
                </div>
                @csrf
                <div class="row my-5">
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-primary">Registrar Ponto</button>
                    </div>
                </div>
            </form>
            @if (!empty($registros))
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Data</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Entrada</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Pausa</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Retorno</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Saída</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Horas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registros as $registro)
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($registro->diames)) }}</td>
                            <td>{{ $registro->entrada ? date('H:i', strtotime($registro->entrada)) : '' }}</td>
                            <td>{{ $registro->almoco_sai ? date('H:i', strtotime($registro->almoco_sai)) : '' }}</td>
                            <td>{{ $registro->almoco_che ? date('H:i', strtotime($registro->almoco_che)) : '' }}</td>
                            <td>{{ $registro->saida ? date('H:i', strtotime($registro->saida)) : '' }}</td>
                            <td>{{ $registro->horas_trabalhadas ? $registro->horas_trabalhadas : '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <br><br>

            <a href="/home"><img class="mt-3 voltar" src="{{ asset('images/SystemImages/voltar.png') }}" alt="voltar" title="Voltar"></a>

            <div class="row">
                <p>VOLTAR</p>
            </div>

        </main>
    </section>

@endsection
