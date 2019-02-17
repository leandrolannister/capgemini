<?php 
class Helper{      
  
  public static function trataTexto($t)
  {
    $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

    $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');  

    $texto = str_replace($comAcentos, $semAcentos, $t); 
    $texto = trim(strtoLower($texto));
  
    return $texto;
  }

  public static function validaPosto($validade, $posto)
  {
  	$hoje = date('Y/m/d');
    $dif = strtotime($validade) - strtotime($hoje);
    $dias = floor($dif / (60 * 60 * 24));
    
    $posto = Helper::trataTexto($posto);

    if($posto == 'sao paulo' and $dias > 30):
     return true;
    endif;

    return false;        
  }
}  