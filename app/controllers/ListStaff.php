<?php
class ListStaff extends Controller
{
    public $staffModal;


    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'ListStaffPage',
        ]);
    }
}
