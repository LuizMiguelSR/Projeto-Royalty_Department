@php
    use Carbon\Carbon;

    $voltar = 'home';
    $data = Carbon::now();
    $mes = $data->locale('pt_BR')->isoFormat('MMMM');
@endphp

@extends('layouts.layout')

@section('titulo', 'Gerenciar Folha de Pagamento')
@section('content')

    <section>
        <main>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 mb-4 me-4" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    // fecha o alerta após 3 segundos
                    setTimeout(function() {
                        document.querySelector('.alert').remove();
                    }, 3000);
                </script>
            @endif
            <img src="{{ asset('images/SystemImages/logobase.png') }}" alt="Logo" title="Logo da Royalty">
            <br><br>
            <div class="row">
                <h1 class="h3 my-5 fw-normal">{{ __('FOLHA DE PAGAMENTO DE '.strtoupper($mes)) }}</h1>
            </div>
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

            @include('layouts._partials.voltar')
            
        </main>
    </section>

@endsection
