<?php
require __DIR__ . '/../vendor/autoload.php'; // Asegúrate de que la ruta al autoload.php es correcta.

$router = new AltoRouter();

// Configura la ruta base si el proyecto está en un subdirectorio
// $router->setBasePath('/subdirectorio');

// Mapeo de rutas
$router->map('GET', '/', function() {
    require __DIR__ . '/../frontend/pages/index.php';
});

$router->map('GET', '/productos', function() {
    require __DIR__ . '/../frontend/pages/products.php';
});

$match = $router->match();

if($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']); 
} else {
    // No se encontró la ruta
    header("HTTP/1.0 404 Not Found");
}
