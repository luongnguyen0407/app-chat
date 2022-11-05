<?php
class Auth extends Controller
{
    use HandleMail;

    function __construct()
    {
    }

    function Show()
    {
        $this->callView('MasterAuth', [
            'Page' => 'LoginPage',
        ]);
    }
    function ResetPass()
    {
        $this->SendMailPass();
        $this->callView('MasterAuth', [
            'Page' => 'ResetPage',
        ]);
    }
}
