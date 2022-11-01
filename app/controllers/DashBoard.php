<?php
class DashBoard extends Controller
{


    function __construct()
    {
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'DashBoardPage',
        ]);
    }
}
