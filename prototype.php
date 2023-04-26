<?php

function breakString($string, $maxLenght) {

    //preparing string, getting lenght, max parts number and so on
$string = trim($string, ' ');
$stringLenght = strlen($string);
$parts = ($stringLenght / $maxLenght );
$finalPatrsNumber = ceil($parts);
$arrayString = explode(' ', $string);
    //defining variables used to store data into a foreach loop
$partString ='';
$new = array();
$arrayNew = array();

   /**
    * go througt every word and glue it to a $partstring
    *
    * check $partstring lenght if it exceded $maxLenght
    * then delete last word and pass it again to $partstring
    * and create now array value
    */

foreach($arrayString as $word){
    $partString.=$word.' ';

    while(  strlen( $partString ) > $maxLenght) {
        $partString = trim($partString, ' ');
        $new = explode(' ', $partString);
        $partString = '';
        $partString.= end($new).' ';
        array_pop($new);
        //var_dump($new);
        if( strlen(implode( $new, ' ' )) < $maxLenght){
            $value = implode( $new, ' ' );
            $arrayNew[] = $value;
        }
    }
}

//    /**
//    * psuh last part of the string into array
//    */
$string2 = implode(' ', $arrayNew);


$string2 = trim($string2, ' ');
$string2lenght = strlen($string2);
$newPart = substr($string, $string2lenght);
$arrayNew[] = $newPart;

  /**
   * return array with broken $parts of $string
    * $party max lenght is < $maxlenght
    * and breaks are only after words
   */
return $arrayNew;

}


$subjectname = "Malikhaing Komunikasyon Gamit ang Panitikang Popular";

foreach( breakString($subjectname, 20) as $line){
  var_dump($line);
}



?>
