<?php
class Controller
{
    public function callModel($model)
    {
        if (file_exists("./app/models/" . $model . ".php")) {
            require_once "./app/models/" . $model . ".php";
            return new $model;
        }
    }
    public function checkUser($isAdmin = false)
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
        if ($isAdmin) {
            return isset($user["role"]) && $user["role"] == 1 ? true : false;
        } else {
            return !empty($user) ? true : false;
        }
    }
    public function callView($view, $data = [])
    {
        if (file_exists("./app/views/" . $view . ".php")) {
            require_once "./app/views/" . $view . ".php";
        } else {
            require_once "./app/views/Master1.php";
        }
    }
}
