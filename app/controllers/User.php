<?php
class User extends Controller
{
    use LoopData;
    public $staffModal;
    public $positionModal;
    public $departmentModal;

    function __construct()
    {
        if (!$this->checkUser()) {
            header('location: ./Auth');
        }
        $this->staffModal = $this->callModal('StaffModal');
        $this->positionModal = $this->callModal('PositionModal');
        $this->departmentModal = $this->callModal('DepartmentModal');
    }

    function Show()
    {
        $this->callView('MasterUser', [
            'Page' => 'UpdateProfile',
            'staff' => $this->returnArray($this->staffModal->getAllStaff())
        ]);
    }
}
