<?php
namespace Strange\Config;

class Routeur
{
    private static $_routes 	= [];
    private static $_matches 	= [];
    private static $_params 	= [];
    private static $url;

    /**
     * Routeur constructor.
     */
    public function __construct()
    {
        self::$url = $_GET['url'] ?? null;
    }

    /**
     * @param $route route
     * @param $controllerCall
     * @return self
     */
    public static function get($route, $controllerCall):self
    {
        $route = trim($route, '/');
        self::$_routes[$route] 		= $controllerCall;
        return new self;
    }

    /**
     * @return mixed|void
     */
    public static function run()
    {
        foreach (self::$_routes as $route => $controller) {
            if (self::match(self::$url, $route)) {
                return self::called($controller);
            }
        }
        return self::error();
    }

    /**
     * @return void
     */
    public static function error()
    {
        echo "<h1>Page inexistante</h1>";
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    /**
     * @param $url l'url taper
     * @param $route route de la page
     * @return bool
     */
    public static function match($url, $route):bool
    {
        $path = preg_replace_callback('#{[a-z_]+}#i','self::paramMatch' , $route);
        $regex = "#^$path/?$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        self::$_matches = $matches;
        return true;
    }

    /**
     * @param $match
     * @return string
     */
    public static function paramMatch($match):string
    {
        $matcher = str_replace(['{','}'],'',$match[0]);
        if (isset(self::$_params[$matcher])) {
            return '('.self::$_params[$matcher].')';
        }
        return '([^/]+)\/?';
    }

    /**
     * @param $param
     * @param $regex
     * @return self
     */
    public function with($param, $regex):self
    {
        self::$_params[$param] = str_replace(['{','}'],'',$regex);
        self::$_params[$param] = str_replace('(', '(?:', $regex);
        return new self;
    }

    /**
     * @param $controller
     * @return mixed
     */
    public static function called($controller)
    {
        if (is_string($controller)) {
            $params = explode('@', $controller);
            $controller = $params[0] . "Controller";
            $controller = new $controller();
            $controller->loadComposant();
            $controller->loadModel();
            return call_user_func_array([$controller, $params[1]], self::$_matches);
        }
        return call_user_func_array($controller, self::$_matches);
    }
}
//cle identification http://monecoledeconduite.fr/ :314323006199805