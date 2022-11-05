//Essa função é para verificar se o valor passado pelo input é String. Se for String não é aceito (é apagado)
function MascaraInteiro(num) {
    var er = /[^0-9/ ().-]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) { ///verifica se é string, caso seja então apaga
      var texto = $(campo).val();
      $(campo).val(texto.substring(0, texto.length - 1));
      return false;
    } else {
      return true;
    }
  }
  
  //Formata de forma generica os campos (Essa é a função que realmente formata os campos, com a exceção do campo de MOEDA)
  function formataCampo(campo, Mascara) {
    var boleanoMascara;
  
    var exp = /\-|\.|\/|\(|\)| /g
    var campoSoNumeros = campo.value.toString().replace(exp, "");
    var posicaoCampo = 0;
    var NovoValorCampo = "";
    var TamanhoMascara = campoSoNumeros.length;
    for (var i = 0; i <= TamanhoMascara; i++) {
      boleanoMascara = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".") ||
        (Mascara.charAt(i) == "/"))
      boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == "(") ||
        (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
      if (boleanoMascara) {
        NovoValorCampo += Mascara.charAt(i);
        TamanhoMascara++;
      } else {
        NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
        posicaoCampo++;
      }
    }
    campo.value = NovoValorCampo;
    ////LIMITAR TAMANHO DE CARACTERES NO CAMPO DE ACORDO COM A MASCARA//
    if (campo.value.length > Mascara.length) {
      var texto = $(campo).val();
      $(campo).val(texto.substring(0, texto.length - 1));
    }
    //////////////
    return true;
  }
  
  //Essa função é para o caso da formatação ser em MOEDA. Entao você deverá chamá-la no INPUT.
  function MascaraMoeda(i) {
    var v = i.value.replace(/\D/g, '');
    v = (v / 100).toFixed(2) + '';
    v = v.replace(".", ",");
    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
    i.value = v;
  
  }
  
  //O segundo parâmetro desta função, é o nome que você coloca lá na chamada dela no INPUT. Isso determina em qual condicional (if, else if, else) a função entrará e qual formatação ela executará.
  function MascaraGenerica(seletor, tipoMascara) {
    setTimeout(function() {
      if (MascaraInteiro(seletor)) {
        if (tipoMascara == 'CPFCNPJ') {
          if (seletor.value.length <= 14) { //cpf
            formataCampo(seletor, '000.000.000-00');
          } else { //cnpj
            formataCampo(seletor, '00.000.000/0000-00');
          }
        } else if (tipoMascara == 'DATA') {
          formataCampo(seletor, '00/00/0000');
        } else if (tipoMascara == 'RG') {
          formataCampo(seletor, '00.000.000-00');
        } else if (tipoMascara == 'CEP') {
          formataCampo(seletor, '00.000-000');
        } else if (tipoMascara == 'TELEFONE') {
          formataCampo(seletor, '(00) 0000-0000');
        } else if (tipoMascara == 'CELULAR') {
          formataCampo(seletor, '(00) 00000-0000');
        } else if (tipoMascara == 'INTEIRO') {
          formataCampo(seletor, '00000000000');
        } else if (tipoMascara == 'CPF') {
          formataCampo(seletor, '000.000.000-00');
        }
      }
    }, 200);
  }