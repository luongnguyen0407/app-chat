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
        $user = $_SESSION['user'];
        $this->callView('MasterUser', [
            'Page' => 'UpdateProfile',
            'staff' => $user
        ]);
    }
}
