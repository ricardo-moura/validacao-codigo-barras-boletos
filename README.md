
# Validação de digito verificador boleto e guia de arrecadação

[![Open Source Love](https://badges.frapsoft.com/os/v1/open-source.svg?v=103)](https://github.com/ellerbrock/open-source-badges/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)


A implementação proposta nesse repo validam o digito verificador do código de barras tando de boletos como o de guia de arrecadação (Ex: Concessionárias de água, luz e telefone).

### Obs:
Como o código de barras tem uma numeração diferente da linha digitável do boleto, caso você precise de uma validação específica para linha digitável recomendo utilizar o [Boleto-Validator-PHP](https://github.com/Tagliatti/Boleto-Validator-PHP) do [@Filipe Tagliatti](https://github.com/Tagliatti).

# Exemplos de uso

```php
<?php
require_once('barcodeValidator.php');

$barcodeValido = validarDigitoVerificacaoBarcode("barcode"); //Cdigo de barra composto de 44 caracteres.

if ($barcodeValido) {
    //barcode valido
}
```

## Referências:

Documentação com o padrão de geração de boletos:
- https://cmsportal.febraban.org.br/Arquivos/documentos/PDF/Layout%20-%20C%C3%B3digo%20de%20Barras%20-%20Vers%C3%A3o%205%20-%2001_08_2016.pdf
- https://www.bb.com.br/docs/pub/emp/empl/dwn/Doc5175Bloqueto.pdf




Link muito útil para exemplificação de calculos de módulo 10 e módulo 11.
http://exemplos.boletoasp.com.br/BoletoNet/BoletoCustomizado.aspx


Ajudou muito para validar os boletos de concessionária com identificador de valor efetivo ou referência maiores que 7 - (Documento da Febraban pg. 7)
http://www.cjdinfo.com.br/solucao-javascript-calculo-digito-modulo-11?p=34


# Licença de uso
Esta biblioteca segue os termos de uso da [The MIT License (MIT)](https://opensource.org/licenses/mit-license.php)
