<?php
class Controller
{
    public function callModal($modal)
    {
        if (file_exists("./app/models/" . $modal . ".php")) {
            require_once "./app/models/" . $modal . ".php";
            return new $modal;
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
