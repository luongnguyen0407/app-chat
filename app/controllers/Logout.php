<?php

class Logout extends Controller
{

    function __construct()
    {
        //model
        unset($_SESSION['user']);
        header('location: ./Auth');
    }
}
