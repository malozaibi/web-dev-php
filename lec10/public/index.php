<?php
// public/index.php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Controller.php';

// Simple autoload (optional)
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/Controllers/',
        __DIR__ . '/../app/Models/',
        __DIR__ . '/../core/'
    ];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$router = new Router();

$router->get('/', 'PostsController@index');
$router->get('/posts', 'PostsController@index');
$router->get('/posts/show/{id}', 'PostsController@show');
$router->post('/posts', 'PostsController@store');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
