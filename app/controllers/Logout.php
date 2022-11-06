<?php

class Logout extends Controller
{

    function __construct()
    {
        //modal
        unset($_SESSION['user']);
        header('location: ./Auth');
    }
}
