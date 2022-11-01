<?php
class ListStaff extends Controller
{


    function __construct()
    {
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'ListStaffPage',
        ]);
    }
}
