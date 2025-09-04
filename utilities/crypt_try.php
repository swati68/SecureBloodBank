<?php 
  
// PHP code to illustrate the working of  
// crypt() and password_hash() 
  
$str = '5ad1234bin86'; 
$options = [ 
               'cost' => 10, 
               'salt' => '$P27r06o9!nasda57b2M22'
           ]; 
             
echo sprintf("Result of crypt() on %s is %s\n",  
             $str, crypt($str, $options['salt'])); 
echo sprintf("Result of DEFAULT on %s is %s\n", 
      $str, password_hash($str, PASSWORD_DEFAULT)); 
echo sprintf("Result of BCRYPT on %s is %s\n", $str,  
    password_hash($str, PASSWORD_BCRYPT, $options));   
?> 