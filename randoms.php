<?php

$alphanum = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generateRandomString($length) {
    $charactersLength = strlen($alphanum);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $alphanum[rand(0, $charactersLength - 1)];
    }
    return $str;
}



/*
This is a more cryptographically secure method, but will not be functional
until PHP 7
*/
function random_str($length){
  $str = '';
  $max = mb_strlen($alphanum, '8bit') - 1;
  for($i = 0; $i < $length; ++$i){
    $str .= $alphnum[random_int(0, $max)];
  }
  return $str;
}


?>
