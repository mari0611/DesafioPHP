<?php

 
function verificarNome ($str)
{
/// verificar quantidade minima de caracteres
   if (strlen($str) < 3) {
       return false;
   }
//Limitar string a 10 caracteres
   if (strlen($str) > 10) {
       return false;
   }
 
   //se chegar até aqui, retorne true
   return true;
}

function verificarSenha ($str) {
    if (strlen($str) < 6) {
        return false;
    }
}


?>





 