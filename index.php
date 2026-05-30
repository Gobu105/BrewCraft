<?php
session_start();

// Load core files
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/routes/web.php';

// Parse the requested URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

// Remove base path if application is running in a subdirectory (e.g. localhost/BrewCraft)
$baseUrl = str_replace('\\', '/', $scriptName);
define('BASE_URL', $baseUrl === '/' ? '' : $baseUrl);

if ($baseUrl !== '') {
    $uri = str_replace($baseUrl, '', $uri);
}

// Default to home if URI is empty
if (empty($uri) || $uri === '/index.php') {
    $uri = '/';
}

// Route the request
if (array_key_exists($uri, $routes)) {
    $parts = explode('@', $routes[$uri]);
    $controllerName = $parts[0];
    $methodName = $parts[1];

    $controllerFile = __DIR__ . "/app/controllers/" . $controllerName . ".php";
    
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerName();
        $controller->$methodName();
    } else {
        http_response_code(500);
        echo "500 Internal Server Error: Controller $controllerName not found.";
    }
} else {
    http_response_code(404);
    echo "404 Not Found: The requested URL was not found on this server.";
}
