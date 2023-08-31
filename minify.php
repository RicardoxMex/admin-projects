<?php

use MatthiasMullie\Minify;

// Función recursiva para obtener todos los archivos CSS y JS en una carpeta
function getFilesRecursive($folder, $extension)
{
    $files = glob($folder . '/*.' . $extension);
    $subfolders = glob($folder . '/*', GLOB_ONLYDIR);

    foreach ($subfolders as $subfolder) {
        $subfiles = getFilesRecursive($subfolder, $extension);
        $files = array_merge($files, $subfiles);
    }

    return $files;
}

// Rutas de los archivos originales CSS y JS
$cssFiles = ['source/css/index.css'];
$jsFiles = getFilesRecursive('source/js/libs', 'js');
$alpineJSFiles = getFilesRecursive('source/js/app', 'js');

// Ruta de los archivos minificados CSS y JS
$minifiedCssFile = 'public/css/main.min.css';
$minifiedJsFile = 'public/js/main.min.js';
$minifiedAlpineJsFile = 'public/js/app.min.js';

// Minificar los archivos CSS
$cssMinifier = new Minify\CSS();
foreach ($cssFiles as $cssFile) {
    $cssMinifier->add($cssFile);
}
$cssMinifier->minify($minifiedCssFile);

// Minificar los archivos JS
$jsMinifier = new Minify\JS();
foreach ($jsFiles as $jsFile) {
    $jsMinifier->add($jsFile);
}
$jsMinifier->minify($minifiedJsFile);

$aplineJSMinifier = new Minify\JS();
foreach ($alpineJSFiles as $jsFile) {
    $aplineJSMinifier->add($jsFile);
}
$aplineJSMinifier->minify($minifiedAlpineJsFile);

//echo "Archivos minificados con éxito.";
