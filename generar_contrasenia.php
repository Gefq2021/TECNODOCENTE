<?php
  function generarContrasenia($longitud = 6) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $caracteresLongitud = strlen($caracteres);
    $contrasenia = '';

    for ($i = 0; $i < $longitud; $i++) {
      $contrasenia .= $caracteres[random_int(0, $caracteresLongitud - 1)];
    }
    return $contrasenia;
  }
?>