<?php
class ListStaff extends Controller
{
    use LoopData;
    public $staffModal;


    function __construct()
    {
        $this->staffModal = $this->callModal('StaffModal');
    }

    function Show()
    {
        $this->callView('Master', [
            'Page' => 'ListStaffPage',
            'staff' => $this->returnArray($this->staffModal->getAllStaff())
        ]);
    }
}
