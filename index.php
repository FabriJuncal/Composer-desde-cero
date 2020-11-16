<?php

// Importar el autoloader

// use un\espacioDeNombres\{ClaseA, ClaseB, ClaseC as C};
// use function un\espacioDeNombres\{fn_a, fn_b, fn_c};
// use const un\espacioDeNombres\{ConstA, ConstB, ConstC};

use PruebaFabricioJuncal\PSR4Autoloader\miClase as aliasMiClase;

require 'vendor/autoload.php';

// Ejecuta la Aplicacion 

$miClase = new aliasMiClase;

echo $miClase->miFuncionPublica().PHP_EOL;

echo $miClase->miFuncion().PHP_EOL;

echo $miClase->miVariable.PHP_EOL;
