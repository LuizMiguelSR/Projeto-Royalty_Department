<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/SystemImages/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/SystemImages/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/SystemImages/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/SystemImages/site.webmanifest') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <title>@yield('titulo')</title>
    </head>
    <body>

        @include('layouts._partials.topo')
        @yield('content')

        <script>
            // Função para atualizar os campos de endereço com os valores retornados pela API do ViaCEP
            function atualizarCamposEndereco(endereco) {
                console.log(endereco);
                $('#endereco').val(endereco.logradouro);
                $('#bairro').val(endereco.bairro);
                $('#cidade').val(endereco.localidade);
                $('#estado').val(endereco.uf);
            }

            // Função para fazer a requisição AJAX para a API do ViaCEP
            function consultarCEP(cep) {
                console.log(cep);
                $.ajax({
                    url: `https://viacep.com.br/ws/${cep}/json/`,
                    type: 'GET',
                    success: function (endereco) {
                        console.log(endereco);
                        atualizarCamposEndereco(endereco);
                    },
                    error: function () {
                        alert('Erro ao consultar o CEP. Por favor, verifique se o CEP está correto e tente novamente.');
                    }
                });
            }

            // Evento para chamar a função consultarCEP quando o usuário digitar o CEP
            $('#cep').on('blur', function () {
                const cep = $(this).val().replace(/\D/g, ''); // Remove todos os caracteres não numéricos do CEP
                console.log(cep);
                if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
                    consultarCEP(cep);
                }
            });
            // Máscara para os campos RG, CPF e Telefone
            $(document).ready(function() {
                $('#registro_geral').mask('00.000.000-A', {translation: {'A': {pattern: /[0-9a-zA-Z]/}}});
                $('#cpf').mask('000.000.000-00');
                $('#telefone').mask('(00) 00000-0000');
            });
        </script>

    </body>

        @include('layouts._partials.footer')

</html>
