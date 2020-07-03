<?php

function isModulo10($barcode) {
    return (int) substr($barcode, 2, 1) === 6 || (int) substr($barcode, 2, 1) === 7;
}

function isModulo11($barcode) {
    return (int) substr($barcode, 2, 1) === 8 || (int) substr($barcode, 2, 1) === 9;
}

function calcModulo10($barcode) {
    $tempBarcode = substr($barcode, 0, 3) . substr($barcode, 4, 40);
    $digitoVerificador = 0;
    $length = 42;
    while ($length >= 0) {
        $currentBarcodeNumber = (int) substr($tempBarcode, $length, 1);
        $padraoFebraban = (int) substr('2121212121212121212121212121212121212121212', $length, 1);
        $currentBarcodeNumber *= $padraoFebraban;
        if ($currentBarcodeNumber >= 10) {
            $digitoVerificador = $digitoVerificador + $currentBarcodeNumber - 10 + 1;
        }

        if ($currentBarcodeNumber < 10) {
            $digitoVerificador += $currentBarcodeNumber;
        }
        $length--;
    }

    $digitoVerificador %= 10;

    if ($digitoVerificador > 0) {
        $digitoVerificador = 10 - $digitoVerificador;
    }
    return $digitoVerificador === (int) substr($barcode, 3, 1);
}

function calcModulo11($barcode) {
    $tempBarcode = substr($barcode, 0, 3) . substr($barcode, 4, 40);
    $digitoVerificador = 0;
    $length = 42;
    while ($length >= 0) {
        $currentBarcodeNumber = (int) substr($tempBarcode, $length, 1);
        $padraoFebraban = (int) substr('4329876543298765432987654329876543298765432', $length, 1);
        $currentBarcodeNumber *= $padraoFebraban;
        $digitoVerificador += $currentBarcodeNumber;
        $length--;
    }

    $digitoVerificador %= 11;
    if ($digitoVerificador === 0 || $digitoVerificador === 1) {
        $digitoVerificador = 0;
    } elseif ($digitoVerificador === 10) {
        $digitoVerificador = 1;
    } else {
        $digitoVerificador = 11 - $digitoVerificador;
    }
    return $digitoVerificador === (int) substr($barcode, 3, 1);
}

function isDigitoVerificadorArrecadacaoValido($barcode) {
    if (isModulo10($barcode)) {
        return calcModulo10($barcode);
    }
    if (isModulo11($barcode)) {
        return calcModulo11($barcode);
    }
}

function isDigitoVerificacaoBoletoValido($barcode) {
    $tempBarcode = substr_replace($barcode, '0', 4, 1);
    $factors = [4,3,2,9,0,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2];
    $sum = 0;
    for ($i = 0; $i < count($factors); $i++) {
        $sum += (int) $tempBarcode[$i] * (int) $factors[$i];
    }

    $digitoVerificador = $sum % 11;
    $result = $digitoVerificador > 1 ? 11 - $digitoVerificador : 1;

    return $result === (int) substr($barcode, 4, 1);
}

function getBarcodeType($barcode) {
    return (int) substr($barcode, 0, 1) === 8 ? 'arrecadacao' : 'boleto';
}

function validarDigitoVerificacaoBarcode($barcode) {
    //Barcode type
    $type = getBarcodeType($barcode);

    if ($type === 'boleto') {
        return isDigitoVerificacaoBoletoValido($barcode);
    }

    if ($type === 'arrecadacao') {
        return isDigitoVerificadorArrecadacaoValido($barcode);
    }
}
