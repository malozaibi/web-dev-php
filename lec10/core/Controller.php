<?php // core/Controller.php
class Controller
{
    protected function view($path, $data = [])
    {
        extract($data); // creates $posts, $post, etc.
        $viewFile = __DIR__ . '/../app/Views/' . $path . '.php';
        $layout   = __DIR__ . '/../app/Views/layouts/main.php';
        ob_start();
        include $viewFile; // inner view
        $content = ob_get_clean();
        include $layout; // wrap inside layout
    }
}
