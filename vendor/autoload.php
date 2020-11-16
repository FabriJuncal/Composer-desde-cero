<?php
/**
 * Un ejemplo de implementación de un autoloader que cargará las clases medianto sus namespace.
 *
 * Después de registrar esta función de carga automática con SPL, la siguiente línea
 * haría que la función intentara cargar la clase PruebaFabricioJuncal\PSR4Autoloader\miClase
 * desde composer-desde-cero/src/miClase.php:
 *
 *      new \Foo\Bar\Baz\Qux;
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {

    // Se recibe como argumento la clase importada antes del autoload con "use".
    // En este caso sería "PruebaFabricioJuncal\Psr4Autoloader\miClase".
    echo "1) class: $class".PHP_EOL;                                                        


    // Se define el Prefijo del namespace del proyecto.
    $vendorNameSpace = 'PruebaFabricioJuncal\PSR4Autoloader';
    echo "2) vendorNameSpace : $vendorNameSpace".PHP_EOL;

    // Se define el Directorio Base donde estarán creadas las clases que luego se importarán con el "namespace".
    $directorioBase = './src/';
    echo "3) directorioBase: $directorioBase".PHP_EOL;

    // De la clase importada con la funcion "use", en este caso "PruebaFabricioJuncal\Psr4Autoloader\miClase".
    // Limpiamos el prefijo del namespace "PruebaFabricioJuncal\Psr4Autoloader\".
    // De este modo la variable "$sinVendorNameSpace" quedaría con el valor "miClase".
    $sinVendorNameSpace = str_replace($vendorNameSpace.'\\', '', $class);
    echo "4) sinVendorNameSpace: $sinVendorNameSpace".PHP_EOL;

    // En el caso que se tenga un "subnamespace" reemplazamos las barras invertidas "\" de la variable $sinVendorNameSpace
    // por las barras comunes que se utilizan para definir una ruta "/".
    // En este caso como no tenemos un "subnamespace", obtendriamos el valor "miClase".
    $rutaDentroDeDirectorioBase = str_replace('\\', DIRECTORY_SEPARATOR, $sinVendorNameSpace); 
    echo "5) rutaDentroDeDirectorioBase: $rutaDentroDeDirectorioBase".PHP_EOL;

    // sprintf: Devuelve un string producido según el string de formateo dado en el 1er parametro. "%s%s.php"
    // Se arma la ruta de la clase que se importará, en este caso el valor que se obtiene es "./src/miClase.php"
    $nombreArchivo = sprintf(
        '%s%s.php',
        $directorioBase,            // ./src/
        $rutaDentroDeDirectorioBase // miClase
    );
    echo "6) nombreArchivo: $nombreArchivo".PHP_EOL;

    // Si el archivo existe, se importa
    if (file_exists($nombreArchivo)) {
        require $nombreArchivo;
    }
});