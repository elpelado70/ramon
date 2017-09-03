<?

define( "UDF_YATA", "si" );

/*------------------------------------------------------------------------*/
function iif( $Valor, $Verdadero = 1, $Falso = 0){
    if ( $Valor ){
        return $Verdadero;
    } else {
        return $Falso;
    }
}

/*------------------------------------------------------------------------*/
function concomi( $Texto ){
    return Chr(34).$Texto.Chr(34);
}


/*--------------------------------------------------------------------*/
function quitarblanco($texto){
    $retorno = "";
    $anterior = "";
    for ($i=0;$i<strlen($texto);$i++){
        $letra = substr($texto,$i,1);
        if (!($letra == " " && $anterior == " ")){
            $retorno .= substr($texto,$i,1);
        }
        $anterior = $letra;
    }
    return $retorno;
}

/*------------------------------------------------------------*/
function str2null($texto=""){
    return "'".$texto."'";
}


?>
