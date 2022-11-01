<?php
class App
{
    protected $controller = 'PageNotPound';
    protected $action = 'Show';
    protected $params = [];
    function __construct()
    {
        // Array ( [0] => Home [1] => abc [2] => 23 )
        $arrUrl = $this->UrlProcess();
        if ($arrUrl) {
            // Handle controller
            if (file_exists("./app/controllers/" . $arrUrl[0] . ".php")) {
                $this->controller = $arrUrl[0];
                unset($arrUrl[0]);
            }
            require_once "./app/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            //handle action
            if (isset($arrUrl[1])) {
                if (method_exists($this->controller, $arrUrl[1])) {
                    $this->action = $arrUrl[1];
                }
                unset($arrUrl[1]);
            }
            $this->params = $arrUrl ? array_values($arrUrl) : [];

            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            require_once "./app/controllers/Home.php";
        }
    }
    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
    }
}
