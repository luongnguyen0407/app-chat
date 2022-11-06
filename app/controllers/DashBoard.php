<?php
class DashBoard extends Controller
{


    function __construct()
    {
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'DashBoardPage',
        ]);
    }
}
