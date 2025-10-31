<?php // core/Router.php
class Router
{
    protected $routes = ['GET' => [], 'POST' => []];

    public function get($uri, $action)
    {
        $this->routes['GET'][$this->normalize($uri)] = $action;
    }
    public function post($uri, $action)
    {
        $this->routes['POST'][$this->normalize($uri)] = $action;
    }

    protected function normalize($uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        return rtrim($uri, '/') ?: '/';
    }

    public function dispatch($method, $uri)
    {
        $uri = $this->normalize($uri);

        // Param routes like /posts/show/{id}
        foreach ($this->routes[$method] as $route => $action) {
            $pattern = '@^' . preg_replace('@\{([^/]+)\}@', '(?P<$1>[^/]+)', $route) . '$@';
            if (preg_match($pattern, $uri, $matches)) {
                return $this->callAction($action, $matches);
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }

    protected function callAction($action, $params)
    {
        list($controller, $method) = explode('@', $action);
        $controllerObj = new $controller();
        return call_user_func_array([$controllerObj, $method], array_values(array_filter($params, 'is_string', ARRAY_FILTER_USE_KEY)));
    }
}
