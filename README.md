
# Validações código de barras boleto / guia de arreacadação

[![Open Source Love](https://badges.frapsoft.com/os/v1/open-source.svg?v=103)](https://github.com/ellerbrock/open-source-badges/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)


Este código foi implementado para validação de código de barras de boletos de cobranças e boletos de arrecadação de concessionárias de água, luz e telefone.

### Obs:
Essa implementação trata de validar o digito verificador do código de barras, caso você precise validar o digito verificador da linha digitável do boleto recomendo implementar esse código: [https://github.com/Tagliatti/Boleto-Validator-PHP](https://github.com/Tagliatti/Boleto-Validator-PHP).

# Exemplos de uso

### Chamada validação digito verificador arrecadação
```php
<?php
require_once('barcodeValidator.php');

$barcodeValido = validarDigitoVerificacaoBarcode("barcode") ;//44 posições

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
