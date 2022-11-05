<?php
class Auth extends Controller
{


    function __construct()
    {
    }

    function Show()
    {
        $this->callView('MasterAuth', [
            'Page' => 'LoginPage',
        ]);
    }
}
